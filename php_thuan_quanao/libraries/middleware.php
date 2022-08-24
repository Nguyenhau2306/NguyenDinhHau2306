<?php 
    class Middeware
    {

        public $level ;
        public $active ='' ;
        public function __construct($active,$level)
        {
            $level = intval($level);
            switch ($level) {
               case 1:
                 if($active == "admin" || $active == "producer" )
                    {
                      redirect("admin/errors");
                     }
                     else
                     {
                          modules('donhang');
                    }
                    
                   break;
            //    case 2:
            //       if($active != "product")
            //         {
            //            redirect("admin/errors");
            //         }
            //        else
            //         {
            //               modules('product');
            //         }
                    break;
                default:
                    break;
            }
        }
    }
 ?>
