<?php
namespace Register\User\Controller\Adminhtml\User;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Downlaod extends Action
{
   
    protected $fileFactory;
    public function __construct(
      Context $context,
      \Magento\Framework\App\Response\Http\FileFactory $fileFactory
       
    ) {
        $this->fileFactory = $fileFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $pdf = new \Zend_Pdf();
        $pdf->pages[] = $pdf->newPage(\Zend_Pdf_Page::SIZE_A4);
        $page = $pdf->pages[0]; 
        $style = new \Zend_Pdf_Style();
        $style->setLineColor(new \Zend_Pdf_Color_Rgb(0,0,0));
        $font = \Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_TIMES);
        $style->setFont($font,15);
        $page->setStyle($style);
        $width = $page->getWidth();
        $hight = $page->getHeight();
        $x = 30;
        $pageTopalign = 500; 
        $this->y = 850 - 100; 
        $page->drawText(__("Thankyou"), $x + 5, $this->y+50, 'UTF-8');
       
        $fileName = 'example.pdf';
        $this->fileFactory->create(
           $fileName,
           $pdf->render(),
           \Magento\Framework\App\Filesystem\DirectoryList::VAR_DIR,
           'application/pdf'
        );
       
    }
}