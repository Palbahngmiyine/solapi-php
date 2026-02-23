<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use GuzzleHttp\Client;
use Nurigo\Solapi\Exceptions\MessageNotReceivedException;
use Nurigo\Solapi\Models\Message;
use Nurigo\Solapi\Services\SolapiMessageService;

/**
 * 커스텀 PSR-18 HTTP 클라이언트를 이용한 SMS 발송 예제
 *
 * SolapiMessageService 생성자의 3번째 인자로 PSR-18(Psr\Http\Client\ClientInterface) 호환 HTTP 클라이언트를 주입할 수 있습니다.
 * 이 예제에서는 Guzzle HTTP 클라이언트를 사용합니다.
 *
 * 사전 설치가 필요합니다:
 *   composer require guzzlehttp/guzzle
 *
 * Guzzle 외에도 PSR-18을 구현한 다른 HTTP 클라이언트를 사용할 수 있습니다:
 *   - Symfony HttpClient (symfony/http-client + symfony/psr-http-message-bridge)
 *   - PHP-HTTP Curl Client (php-http/curl-client)
 */
try {
    // Guzzle 클라이언트 생성 (필요에 따라 옵션을 설정할 수 있습니다)
    $httpClient = new Client([
        'timeout' => 10,
        'connect_timeout' => 5,
        // 'proxy' => 'http://proxy.example.com:8080',
        // 'verify' => '/path/to/cacert.pem',
    ]);

    // SolapiMessageService 생성 시 3번째 인자로 커스텀 HTTP 클라이언트를 전달합니다
    $messageService = new SolapiMessageService("ENTER_YOUR_API_KEY", "ENTER_YOUR_API_SECRET", $httpClient);

    $message = new Message();
    $message->setTo("수신번호")
        ->setFrom("계정에서 등록한 발신번호 입력")
        ->setText("한글 45자, 영자 90자 이하 입력되면 자동으로 SMS타입의 메시지가 발송됩니다.");

    $result = $messageService->send($message);
    print_r($result);
} catch (MessageNotReceivedException $exception) {
    print_r($exception->getFailedMessageList());
    print_r("----");
    print_r($exception->getMessage());
} catch (Exception $exception) {
    print_r($exception->getMessage());
}
