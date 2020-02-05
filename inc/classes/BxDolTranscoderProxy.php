<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaCore UNA Core
 * @{
 */

/**
 * This transcoder can be used as universal transcoder for videos and images.
 * Depending on original file MIME type it calls the appropriate transcoder.
 * Proxied transcoders names are specified in 'source_params' array:
 * - object: original file storage object
 * - image: image transcoder name
 * - video_poster: video transcoder name for video poster image 
 * - video: video transcoders array to force conversion for
 */
class BxDolTranscoderProxy extends BxDolTranscoder implements iBxDolFactoryObject
{
    protected function __construct($aObject, $oStorage)
    {
        parent::__construct($aObject, $oStorage);
        $this->_oDb = new BxDolTranscoderImageQuery($aObject, false);
        $this->_sQueueTable = $this->_oDb->getQueueTable();
    }

    /**
     * check if transcoder suppors given file mime type
     */ 
    public function isMimeTypeSupported($sMimeType)
    {
        if ($this->_isImage($sMimeType) && !empty($this->_aObject['source_params']['image']))
            $sTranscoder = $this->_aObject['source_params']['image'];
        elseif ($this->_isVideo($sMimeType) && !empty($this->_aObject['source_params']['video_poster']))
            $sTranscoder = $this->_aObject['source_params']['video_poster'];
        else
            return false;

        $oTranscoder = BxDolTranscoder::getObjectInstance($sTranscoder);
        if (!$oTranscoder)
            return false;        

        return $oTranscoder->isMimeTypeSupported($sMimeType);
    }
    
    /**
     * Depending on original file mime type call appropriate transcoder 
     */
    public function getFileUrl($mixedHandler)
    {
        $oStorageOriginal = BxDolStorage::getObjectInstance($this->_aObject['source_params']['object']);
        if (!$oStorageOriginal)
            return false;

        $aFile = $oStorageOriginal->getFile($mixedHandler);
        if (!$aFile)
            return false;

        $sTranscoder = '';
        if ($this->_isImage($aFile['mime_type']) && !empty($this->_aObject['source_params']['image'])) {
            $sTranscoder = $this->_aObject['source_params']['image'];
        } 
        elseif ($this->_isVideo($aFile['mime_type']) && !empty($this->_aObject['source_params']['video_poster'])) {
            $sTranscoder = $this->_aObject['source_params']['video_poster'];

            // if additional video transcoders provided call it to force video conversion
            if (!empty($this->_aObject['source_params']['video']))
                foreach ($this->_aObject['source_params']['video'] as $sVideoTranscoder) {
                    if (!($oTranscoder = BxDolTranscoderVideo::getObjectInstance($sVideoTranscoder)))
                        continue;
                    
                    $oTranscoder->getFileUrl($mixedHandler);                
                }
        }
    
        if (!$sTranscoder)
            return false;

        if (!($oTranscoder = BxDolTranscoderImage::getObjectInstance($sTranscoder)))
            return false;
        
        return $oTranscoder->getFileUrl($mixedHandler);
    }

    protected function _isImage($sMimeType)
    {
        return strncmp($sMimeType, 'image/', 6) === 0;
    }

    protected function _isVideo($sMimeType)
    {
        return strncmp($sMimeType, 'video/', 6) === 0;
    }
}

/** @} */
