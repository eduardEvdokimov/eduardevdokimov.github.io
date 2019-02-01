<?php
    function newFormatDate($item){
        $arrDate = [
                    'Jan' => 'января',
                    'Feb' => 'февраля', 
                    'Mar' => 'марта', 
                    'Apr' => 'апреля', 
                    'May' => 'мая',  
                    'Jun' => 'июня', 
                    'Jul' => 'июля', 
                    'Aug' => 'августа', 
                    'Sep' => 'сентября', 
                    'Oct' => 'октября', 
                    'Nov' => 'ноября', 
                    'Dec' => 'декабря'];
        if(!empty($item)){
            if (is_array($item[0])) {
                foreach ($item as $v) {
                    $date = new DateTime($v['pub_date']);
                    $month = $date->format('M');
                    $finalDate = $date->format('d M Y в H:i');
                    $v['pub_date'] = str_replace($month, $arrDate[$month], $finalDate);
                    $items[] = $v; 
                }
                return $items;
            }else{
                $date = new DateTime($item['pub_date']);
                $month = $date->format('M');
                $finalDate = $date->format('d M Y в H:i');
                $item['pub_date'] = str_replace($month, $arrDate[$month], $finalDate);
                return $item;
            }
        }else{
            return false;
        
        }    
    }
