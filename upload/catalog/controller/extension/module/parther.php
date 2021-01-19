<?php

class ControllerExtensionModuleParther extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $this->load->model('extension/module/parther');
        
        if (false === key_exists('partner_id', $this->request->get)) {
            $this->response->setOutput($this->model_extension_module_parther->defaultHTML());
            
            return;
        }
        
        $partner = $this->model_extension_module_parther->getPartnerByProductId((int)$this->request->get['partner_id']);
        if (true === key_exists('html', $partner)) {
            $html = trim(html_entity_decode($partner['html']));
            if (mb_strlen($html) > 0) {
                $this->response->setOutput($html);
            
                return;
            }
        }

        $this->response->setOutput($this->model_extension_module_parther->defaultHTML());
    }
}
