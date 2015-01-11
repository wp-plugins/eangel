<?php

    function eangel_send() {
            global $eangel_options; // The global var from eangel.php
            
            $postId = wp_filter_nohtml_kses($_POST['postId']);
            $oPost = get_post($postId);
            $phpCalWordCount = eangel_get_word_count($oPost->post_content);
            
            $url = 'https://eangel.me/api/extwp';
            
            if (empty($eangel_options['password'])){
                $data = array('type' => 'html', 
                          'encemail' => base64_encode($eangel_options['email']),                          
                          'enctext' => base64_encode($oPost->post_content),
                          'lang' => 'english');
            } else {
                $data = array('type' => 'html', 
                          'encemail' => base64_encode($eangel_options['email']),
                          'encpass' => base64_encode($eangel_options['password']),
                          'enctext' => base64_encode($oPost->post_content),
                          'lang' => 'english');
            }
                
            

            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data),
                ),
            );
            $context = stream_context_create($options);
            $result  = file_get_contents($url, false, $context);


//            echo '<p>'.$oPost->post_content.'</p>';
            echo '<p>'.$result.'</p>';
//            echo '<p>'.$eangel_options['password'].'</p>';
            
            
            
            
            exit;
    }


?>