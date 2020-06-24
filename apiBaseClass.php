<?php
class apiBaseClass {
    
    function createDefaultJson() {
        $retObject = json_decode('{}');
        return $retObject;
    }
}

?>