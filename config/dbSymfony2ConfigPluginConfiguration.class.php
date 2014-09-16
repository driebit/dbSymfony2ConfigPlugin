<?php

/**
 * {@inheritdoc}
 */
class dbSymfony2ConfigPluginConfiguration extends sfPluginConfiguration
{
    public function initialize()
    {   
        if (!$this->configuration instanceof sfApplicationConfiguration) {
            return;
        }
        
        $parametersFile = sfConfig::get('app_symfony2_config_file');
        $prefix = sfConfig::get('app_symfony2_config_prefix');
        
        $configCache = $this->configuration->getConfigCache();
        $configCache->registerConfigHandler(
            $parametersFile, 
            'Symfony2ConfigHandler',
            array(
                'prefix' => $prefix
            )
        );
        
        $configCache = $this->configuration->getConfigCache();
        require_once($configCache->checkConfig($parametersFile));
    }
}
