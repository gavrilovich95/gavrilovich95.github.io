<?
function output_err($num) 
{ 
    $err[0] = 'ОШИБКА! Не введено имя.'; 
    $err[1] = 'ОШИБКА! Неверно введен e-mail.'; 
    $err[2] = 'ОШИБКА! Не введено сообщение.'; 

    $arr = array('error' => "true", 'mess' => $err[$num]);
    print json_encode($arr);
    
} 

function complete_mail() { 
        
        $_POST['title'] =  substr(htmlspecialchars(trim($_POST['title'])), 0, 1000); 
        $_POST['question'] =  substr(htmlspecialchars(trim($_POST['question'])), 0, 1000000); 
        $_POST['name'] =  substr(htmlspecialchars(trim($_POST['name'])), 0, 30); 
        $_POST['telephone'] =  substr(htmlspecialchars(trim($_POST['telephone'])), 0, 30); 
        $_POST['email'] =  substr(htmlspecialchars(trim($_POST['email'])), 0, 50);
        $_POST['price'] =  substr(htmlspecialchars(trim($_POST['price'])), 0, 10);
        
        // если не заполнено поле "Имя" - показываем ошибку 0 
        if (empty($_POST['name'])) {
              output_err(0);        	
        } 

        // если неправильно заполнено поле email - показываем ошибку 1 
        if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST['email'])) {
              output_err(1);        	
        }

        // если не заполнено поле "Сообщение" - показываем ошибку 2 
        if(empty($_POST['question'])) {
             output_err(2);         	
        } 

		$header = "Магазин 'Багровый Песок' :: ";

        if( !empty($_POST['price']) ) {
        	$header = $header . "заказ ". $_POST['price'];
        } else {
        	$header = $header . "вопрос по заказу";
        }

        // создаем наше сообщение 
        $mess = $header .
        		"\r\n\r\n Имя отправителя: ". $_POST['name'].
        		"\r\n Контактный телефон: ". $_POST['telephone'].
        		"\r\n Контактный email: ". $_POST['email'].
        		"\r\n\r\n". $_POST['title'].
        		"\r\n". $_POST['question']; 

        // $to - кому отправляем 
        $to = 'gavrilovich95@yandex.ru'; 
        // $from - от кого 
        $from = $_POST['email']; 
        
        mail($to, $_POST['title'], $mess, "From:".$from); 
        
        $arr = array('success' => "true");
        print json_encode($arr);
        
}
 
    complete_mail(); 
?>
 