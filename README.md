# laravel 火币REST API请求库 扩展包


## 安装

使用laravel

```shell
composer require shishao/huobi-api
```

注册

在config/app.php 文件中
```shell
    'providers' => [
        // ...
        shishao\huobiApi\HuobiServiceProvider::class,
    ]
```

门面

在config/app.php 文件中
```shell
    'aliases' => [
        // ...
        'HuobiApi' => shishao\huobiApi\Facades\HuobiApiFacade::class
    ]
```


添加huobi.php配置文件到config文件中

```
php artisan vendor:publish --tag=config-huobi
```


## 例子
```
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use shishao\huobiApi\Huobi\HuobiApi;

class TestController extends Controller
{
    /**
     * @var \shishao\huobiApi\Huobi\HuobiApi
     */
    protected $huobi;


    public function __construct(HuobiApi $huobi)
    {
        $this->huobi = $huobi;
    }

    public function index()
    {
        dd($this->huobi->get_account_balance());
    }

}

```