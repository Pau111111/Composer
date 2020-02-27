<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
    Enter feed URL here: <input type="url" name="feed_url" value="http://dummy.restapiexample.com/api/v1/employees">
    <input type="submit" value="Read">
    </form>
    <?php
    if(isset($_REQUEST['feed_url'])){
        require './vendor/autoload.php';

        $myClient = new GuzzleHttp\Client([
            'headers' => ['User-Agent'=>'MyReader']
        ]);

        $response = $myClient->request('GET', $_REQUEST['feed_url']);
        if($response->getStatusCode() == 200){
            if($response->hasHeader('content-length')){
                $contentLength = $response->getHeader('content-lenght')[0];
                echo "<p>Downloaded $contentLength bytes of data.</p>";
            }
            $body = $response->getBody();
            
            /* XML RESPONSE */
            //$xml = new SimpleXMLElement($body);
            
            /* JSON RESPONSE */
            $json = json_decode($body->getContents());
            //ALTERNATIVE
            //$json = json_decode($body->getContents())[0];
            
            //var_dump($json->data);

            foreach($json->data as $item){
                echo "<h3>" . $item->employee_name . "</h3>";
            }

            // foreach($xml->channel->item as $item){
            //     echo "<h3>" . $item->title . "</h3>";
            //     echo "<p>" . $item->description . "</>";
            // }
        }
    }
    ?>
</body>
</html>