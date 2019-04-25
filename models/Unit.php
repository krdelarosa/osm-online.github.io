<?php

namespace app\models;

use Yii;
use yii\base\Model;

class lessee extends Model{

#Unit ID
#Unit Type (Multi-Room Apartment, Studio-type Apartment, Room)
#number of occupants (max,count)
#Occupancy Status (Vacant, Occupied)

    public $unit_id;
    public $unit_type;
    public $max_occupants;
    public $occupant_count;
    public $occupancy_status;

    public function getUnitType(){
        return $unit_type;
    }

    public function getOccupantCountInfo(){
        return [$max_occupants,$occupant_count];
    }

    public function getUnitStatus(){
        return $occupancy_status;
    }

    public function setUnitType($unit_type){
        this.$unit_type = $unit_type;
    }

    public function addOccupant(){
        this.$occupant_count += 1;
    }

    public function removeOccupant(){
        this.$occupant_count -= 1;
    }

    public function setMaxOccupants($max_occupants){
        this.$max_occupants = $max_occupants;
    }

    public function setOccupancyStatus($occupancy_status){
        this.$occupancy_status = $occupancy_status;
    }


}

?>