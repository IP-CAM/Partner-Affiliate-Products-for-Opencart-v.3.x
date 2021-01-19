<?php

class ControllerExtensionModuleParther extends Controller
{
    /**
     * @return void
     */
    public function install()
    {
        $this->load->model('extension/module/parther');
        $this->model_extension_module_parther->install();
    }

    /**
     * @return void
     */
    public function uninstall()
    {
        $this->load->model('extension/module/parther');
        $this->model_extension_module_parther->uninstall();
    }
}
