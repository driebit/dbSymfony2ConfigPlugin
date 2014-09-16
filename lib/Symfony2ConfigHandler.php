<?php

/**
 * Imports Symfony2 parameters.yml config file into a Symfony1 app
 */
class Symfony2ConfigHandler extends sfYamlConfigHandler
{
    /**
     * {@inheritdoc}
     */
    public function execute($configFiles)
    {
        $prefix = strtolower($this->getParameterHolder()->get('prefix', ''));
        
        $config = $this->parseYamls($configFiles);

        $string = "<?php\nsfConfig::add(array(\n%s));\n";
        $data = '';
        foreach ($config['parameters'] as $key => $value) {
            $data .= sprintf("  '%s%s' => %s,\n", $prefix, $key, var_export($value, true));              
        }
        
        return sprintf($string, $data);
    }
}
