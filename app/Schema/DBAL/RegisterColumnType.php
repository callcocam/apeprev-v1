<?php

namespace App\Schema\DBAL;


use Doctrine\DBAL\Types\Type;
use Illuminate\Support\Facades\DB;
use App\Schema\DBAL\Types\DoubleType;
use App\Schema\DBAL\Types\EnumType;
use App\Schema\DBAL\Types\GeometryCollectionType;
use App\Schema\DBAL\Types\GeometryType;
use App\Schema\DBAL\Types\IpAddressType;
use App\Schema\DBAL\Types\JsonbType;
use App\Schema\DBAL\Types\LineStringType;
use App\Schema\DBAL\Types\LongTextType;
use App\Schema\DBAL\Types\MacAddressType;
use App\Schema\DBAL\Types\MediumIntegerType;
use App\Schema\DBAL\Types\MediumTextType;
use App\Schema\DBAL\Types\MultiLineStringType;
use App\Schema\DBAL\Types\MultiPointType;
use App\Schema\DBAL\Types\MultiPolygonType;
use App\Schema\DBAL\Types\PointType;
use App\Schema\DBAL\Types\PolygonType;
use App\Schema\DBAL\Types\SetType;
use App\Schema\DBAL\Types\TimestampType;
use App\Schema\DBAL\Types\TimestampTzType;
use App\Schema\DBAL\Types\TimeTzType;
use App\Schema\DBAL\Types\TinyIntegerType;
use App\Schema\DBAL\Types\Types;
use App\Schema\DBAL\Types\UUIDType;
use App\Schema\DBAL\Types\YearType;
use App\Schema\Enum\Driver;

class RegisterColumnType
{
    /**
     * @throws \Doctrine\DBAL\Exception
     */
    public function handle(): void
    {
        /**
         * The map of supported doctrine mapping types.
         */
        $customTypeMap = [
            // [$name => $className]
            Types::DOUBLE              => DoubleType::class,
            Types::ENUM                => EnumType::class,
            Types::GEOMETRY            => GeometryType::class,
            Types::GEOMETRY_COLLECTION => GeometryCollectionType::class,
            Types::IP_ADDRESS          => IpAddressType::class,
            Types::JSONB               => JsonbType::class,
            Types::LINE_STRING         => LineStringType::class,
            Types::LONG_TEXT           => LongTextType::class,
            Types::MAC_ADDRESS         => MacAddressType::class,
            Types::MEDIUM_INTEGER      => MediumIntegerType::class,
            Types::MEDIUM_TEXT         => MediumTextType::class,
            Types::MULTI_LINE_STRING   => MultiLineStringType::class,
            Types::MULTI_POINT         => MultiPointType::class,
            Types::MULTI_POLYGON       => MultiPolygonType::class,
            Types::POINT               => PointType::class,
            Types::POLYGON             => PolygonType::class,
            Types::SET                 => SetType::class,
            Types::TIMESTAMP           => TimestampType::class,
            Types::TIMESTAMP_TZ        => TimestampTzType::class,
            Types::TIME_TZ             => TimeTzType::class,
            Types::TINY_INTEGER        => TinyIntegerType::class,
            Types::UUID                => UUIDType::class,
            Types::YEAR                => YearType::class,
        ];

        foreach ($customTypeMap as $dbType => $class) {
            $this->registerCustomDoctrineType($dbType, $class);
        }

        $doctrineTypes = [
            Driver::MYSQL()->getValue()  => [
                'bit'            => Types::BOOLEAN,
                'geomcollection' => Types::GEOMETRY_COLLECTION,
                'json'           => Types::JSON,
                'mediumint'      => Types::MEDIUM_INTEGER,
                'tinyint'        => Types::TINY_INTEGER,
            ],
            Driver::PGSQL()->getValue()  => [
                '_int4'     => Types::TEXT,
                '_numeric'  => Types::FLOAT,
                '_text'     => Types::TEXT,
                'cidr'      => Types::STRING,
                'geography' => Types::GEOMETRY,
                'inet'      => Types::IP_ADDRESS,
                'macaddr'   => Types::MAC_ADDRESS,
                'oid'       => Types::STRING,
            ],
            Driver::SQLITE()->getValue() => [],
            Driver::SQLSRV()->getValue() => [
                'geography'  => Types::GEOMETRY,
                'money'      => Types::DECIMAL,
                'smallmoney' => Types::DECIMAL,
                'tinyint'    => Types::TINY_INTEGER,
                'xml'        => Types::TEXT,
            ],
        ];

        foreach ($doctrineTypes[DB::getDriverName()] as $dbType => $doctrineType) {
            $this->registerDoctrineTypeMapping($dbType, $doctrineType);
        }
    }

    /**
     * Register custom doctrine type, override if exists.
     *
     * @param  string  $dbType
     * @param  string  $class  The class name of the custom type.
     * @throws \Doctrine\DBAL\Exception
     */
    private function registerCustomDoctrineType(string $dbType, string $class): void
    {
        $this->addOrOverrideType($dbType, $class);
        $this->registerDoctrineTypeMapping($dbType, $dbType);
    }

    /**
     * Add or override doctrine type.
     *
     * @param  string  $dbType
     * @param  string  $class  The class name of the custom type.
     * @throws \Doctrine\DBAL\Exception
     */
    private function addOrOverrideType(string $dbType, string $class): void
    {
        if (!Type::hasType($dbType)) {
            Type::addType($dbType, $class);
            return;
        }

        Type::overrideType($dbType, $class);
    }

    /**
     * Registers a doctrine type to be used in conjunction with a column type of this platform.
     *
     * @param  string  $dbType
     * @param  string  $doctrineType
     * @throws \Doctrine\DBAL\Exception
     */
    private function registerDoctrineTypeMapping(string $dbType, string $doctrineType): void
    {
        DB::getDoctrineConnection()
            ->getDatabasePlatform()
            ->registerDoctrineTypeMapping($dbType, $doctrineType);
    }
}
