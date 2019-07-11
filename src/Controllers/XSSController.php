<?php
class XSSController{
    public function out($in){
        return htmlspecialchars($in);
    }

}
function print_str($in){
    echo XSSController::out($in);
}