<?php

namespace Admin\Grid\Ui\Component\Listing\Grid\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class Action extends Column
{
    private $_editUrl;


    const ROW_EDIT_URL = 'admin_grid/grid/addrow';

     
    
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::ROW_EDIT_URL
    ) 
    {
        $this->_urlBuilder = $urlBuilder;
        $this->_editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
              
              
                if (isset($item['id'])) {
                    // die("scsygcscsc");
                    $item[$name]['edit'] = [
                        'href' => $this->_urlBuilder->getUrl( 
                            $this->_editUrl,
                            ['id' => $item['id']]
                        ),
                        'label' => __('Edit'),
                        
                    ];

                    // echo "<pre>";print_r( $item[$name]['edit']);die;
                }
            }
        }

        return $dataSource;
    }
}