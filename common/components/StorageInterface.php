<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;
use Yii\web\UploadedFile;
/**
 * Description of StorageInterface
 *
 * @author Дмитрий
 */
interface StorageInterface {
    public function saveUploadedFile(UploadedFile $file);
    
    public function getFile(string $filename);
}
