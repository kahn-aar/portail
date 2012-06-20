<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Album', 'doctrine');

/**
 * BaseAlbum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $location
 * @property integer $visibility
 * @property integer $asso_id
 * @property Asso $Asso
 * @property Doctrine_Collection $Images
 * 
 * @method string              getName()       Returns the current record's "name" value
 * @method string              getLocation()   Returns the current record's "location" value
 * @method integer             getVisibility() Returns the current record's "visibility" value
 * @method integer             getAssoId()     Returns the current record's "asso_id" value
 * @method Asso                getAsso()       Returns the current record's "Asso" value
 * @method Doctrine_Collection getImages()     Returns the current record's "Images" collection
 * @method Album               setName()       Sets the current record's "name" value
 * @method Album               setLocation()   Sets the current record's "location" value
 * @method Album               setVisibility() Sets the current record's "visibility" value
 * @method Album               setAssoId()     Sets the current record's "asso_id" value
 * @method Album               setAsso()       Sets the current record's "Asso" value
 * @method Album               setImages()     Sets the current record's "Images" collection
 * 
 * @package    simde
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAlbum extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('album');
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('location', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('visibility', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('asso_id', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Asso', array(
             'local' => 'asso_id',
             'foreign' => 'id'));

        $this->hasMany('Image as Images', array(
             'local' => 'id',
             'foreign' => 'album_id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}