<?php
interface Middleware{
    public function getRoutes();
    public function next();
    public function allow():bool;
} 