<?php
namespace PowerBi\AddReport\Block;

use Magento\Framework\View\Element\Template;
use PowerBi\AddReport\Model\Role;

class RoleSelect extends Template
{
    protected $role;

    public function __construct(
        Template\Context $context,
        Role $role,
        array $data = []
    ) {
        $this->role = $role;
        parent::__construct($context, $data);
    }

    public function getRoles()
    {
        return $this->role->getRoles();
    }
}
