<?php

namespace spec\DusanKasan\Chan\Requests;

use DusanKasan\Chan\Client\JsonClient;
use DusanKasan\Chan\Requests\ThreadRequest;
use DusanKasan\Chan\ValueObjects\Thread;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin ThreadRequest
 */
class ThreadRequestSpec extends ObjectBehavior
{
    /**
     * @var JsonClient
     */
    private $client;

    function let(JsonClient $client)
    {
        $this->client = $client;

        $this->beConstructedWith(
            $this->client,
            't',
            '123456'
        );
    }

    function it_can_get_thread()
    {
        $data = json_decode('{"posts":[{"no":690437,"now":"12\/12\/15(Sat)14:29:25","name":"Anonymous","sub":"Near-dead torrents that I&#039;m seeding (Japanese music)","com":"Samurai Spirits complete soundtrack collection: magnet:?xt=urn:btih:9f18b0ed21b8184<wbr>b34872bee67bff0f619b32370&amp;dn=Samura<wbr>i%20Spirits%20(Samurai%20Shodown)%2<wbr>0Full%20Lossless%20Collection%20%2b<wbr>%20Extra%20%5b45%20CD%20%2b%204%20D<wbr>VD%5d&amp;tr=http%3a%2f%2fopen.nyaatorr<wbr>ents.info%3a6544%2fannounce<br><br>It&#039;s mostly Japanese music here. Post your nearly dead torrents here in hopes that it&#039;ll be revived. I&#039;ll try to make individual posts for anything interesting.<br><br>List: http:\/\/pastebin.com\/0bpU2L8W","filename":"EfizJ0f","ext":".jpg","w":800,"h":450,"tn_w":250,"tn_h":140,"tim":1449948565613,"time":1449948565,"md5":"qfHHatLUiGPL3IEfpzHTkw==","fsize":156228,"resto":0,"bumplimit":0,"imagelimit":0,"semantic_url":"neardead-torrents-that-im-seeding-japanese-music","replies":38,"images":8,"unique_ips":17},{"no":690438,"now":"12\/12\/15(Sat)14:31:52","name":"Anonymous","com":"CROW&#039;SCLAW complete compilation: magnet:?xt=urn:btih:2cf6a6410a43b99<wbr>caf1cc34ba0cce9e3452fe6a1&amp;dn=CROW%2<wbr>7SCLAW%20Complete%20Compilation&amp;tr=<wbr>http%3a%2f%2fopen.nyaatorrents.info<wbr>%3a6544%2fannounce&amp;tr=http%3a%2f%2f<wbr>tracker.openbittorrent.com%2fannoun<wbr>ce&amp;tr=http%3a%2f%2fdenis.stalker.h3<wbr>q.com%3a6969%2fannounce&amp;tr=http%3a%<wbr>2f%2finferno.demonoid.com%3a3404%2f<wbr>announce&amp;tr=http%3a%2f%2ftracker.pu<wbr>blicbt.com%2fannounce&amp;tr=http%3a%2f<wbr>%2ftpb.tracker.prq.to%2fannounce&amp;tr<wbr>=http%3a%2f%2ftracker.prq.to%2fanno<wbr>unce&amp;tr=http%3a%2f%2fnemesis.1337x.<wbr>org%2fannounce&amp;tr=http%3a%2f%2fbitt<wbr>rk.appspot.com%2fannounce&amp;tr=udp%3a<wbr>%2f%2ftracker.openbittorrent.com%3a<wbr>80%2fannounce<br><br>Anyone with an used seedbox, here&#039;s your links.","filename":"(C78) [CROW&#039;SCLAW] Over The Rainbow","ext":".jpg","w":500,"h":500,"tn_w":125,"tn_h":125,"tim":1449948712017,"time":1449948712,"md5":"g1QV8Bu97ZJvEa88l57ExA==","fsize":327688,"resto":690437}]}', true);
        $this->client->get('http://a.4cdn.org/t/thread/123456.json')->willReturn($data);

        $this->getThread()->shouldBeAnInstanceOf(Thread::class);
    }
}
