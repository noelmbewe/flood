<?php
        //Create an instance; passing `true` enables exceptions
        require 'Twilio/autoload.php';
        use Twilio\Rest\Client;
        use Twilio\TwiML\MessagingResponse;
        $message = " halla bro ";
        $client = new Client('AC6fa1a7c8131775575c669126a9dee066', 'ca41a2ff6a1f30a2d940ebf0949f959d');
        $client->messages->create(
        // Where to send a text message (your cell phone?)
            '+256881343571',
            array(
                
                'from' => '+17755356922',
                'body' => $message
            )
        );

        if($client){
        	echo "success";
        }else{
        	echo "failed to send";
        }
?>