<?php

namespace Prueba\Office\Setup;

use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\AddAttribute;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $departmentFactory;
    protected $employeeFactory;

    public function __construct(
        \Prueba\Office\Model\DepartmentFactory $departmentFactory,
        \Prueba\Office\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
                
        
        $salesDepartment = $this->departmentFactory->create();
        $salesDepartment->setName('Sales');
        $salesDepartment-save();
        
        
        $employee = $this->employeeFactory->create();
        $employee->setDepartmentId($salesDepartment->getId());
        $employee->setEmail('clizcano@bicicletasmilan.com');
        $employee->setFirtName('Cristhian');
        $employee->setLastName('Lizcano');
        $employee->setServiceYears(3);
        $employee->setDob('1992-04-16');
        $employee->setSalary(1000.);
        $employee->setVatNumber('1020770685');
        $employee->setNote('Just some notes about John');
        $employee->save();

        
        $financeDepartment = $this->departmentFactory->create();
        $financeDepartment->setName('Finance');
        $financeDepartment->save();

        $employee = $this->employeeFactory->create();


        $employee->setDepartmentId($financeDepartment->getId());
        $employee->setEmail('anna@sales.loc');
        $employee->setFirtName('Anna');
        $employee->setLastName('Doe');
        $employee->setServiceYears(5);
        $employee->setDob('1986-08-16');
        $employee->setSalary(4200.0);
        $employee->setVatNumber('GB223344556');
        $employee->setNote('Just some notes about Anna');
        $employee->save();
        

        $setup->endSetup();

    }

    public function getDepartmentId($id)
    {
        return $this->employeeFactory->create()->load($id);
    }

    public function getDepartmentEmail($email)
    {
        $collection = $this->employeeFactory->create();
        $collection->getCollection()
         ->addFieldToFilter('vatNumber', ['eq' => $email])
         ->AddAttributeToFilter('vatNumber', ['eq' => $email]);
         return $collection;
    }
}