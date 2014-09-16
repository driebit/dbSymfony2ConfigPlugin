dbSymfony2ConfigPlugin
======================

This plugin imports parameters from a Symfony2 `parameters.yml` file.

Configuration
-------------

Configure this plugin in your `app.yml`:

```yml
  symfony2_config: 
    prefix: sf2_                             # Default config key prefix 
    file: '../sf2/app/config/parameters.yml' # Path to parameters.yml
```
