<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:40
 */

namespace CodeGenerator\Property;

use Zend\Db\Metadata\Object\ColumnObject;

class PropertyFactory
{

    /**
     * @param ColumnObject $column
     * @return AbstractProperty
     */
    public function create(ColumnObject $column)
    {
        switch ($column->getDataType()) {
            case 'tinyint':
                return new TextProperty($column);
                break;
            case 'smallint':
                return new TextProperty($column);
                break;
            case 'mediumint':
                return new TextProperty($column);
                break;
            case 'int':
                return new IntProperty($column);
                break;
            case 'bigint':
                return new TextProperty($column);
                break;
            case 'double':
                return new TextProperty($column);
                break;
            case 'text':
                return new TextProperty($column);
                break;
            case 'varchar':
            case 'char':
                return new TextProperty($column);
                break;
            case 'date':
                return new TextProperty($column);
                break;
            case 'datetime':
                return new TextProperty($column);
                break;
            case 'enum':
                return new EnumProperty($column);
                break;
        }

        throw new \RuntimeException('Could not create Property object for column type ' . $column->getDataType());
    }
}