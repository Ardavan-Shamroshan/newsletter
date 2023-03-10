<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Post\Entities\Post;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        Post::query()->create([
            'author_id' => 1,
            'category_id' => 1,
            'title' => 'جنجال دوباره در پاریس: فروش نیمار با 50 میلیون!.',
            'summary' => 'به نظر می‌رسد که ایده فروش نیمار، ستاره برزیلی، بار دیگر در بین مدیران پاری سن ژرمن مطرح شده است..',
            'body' => '
           نیمار از زمان پیوستن به پاری سن ژرمن آمار خوبی را به ثبت رسانده اما همچنان نتوانسته انتظارات را با توجه به انتقال 222 میلیون یورویی‌اش به این تیم برآورده کند. 
مصدومیت‌های متعدد این بازیکن در چند فصل گذشته به یکی از ویژگی‌های اصلی دوران حضور او در ورزشگاه پارک دو پرنس تبدیل شده و انتقادهای بسیاری را به همراه داشته است. 
تابستان گذشته جنجال بسیاری بر سر شایعه درخواست کیلیان امباپه از مدیران این باشگاه برای فروش نیمار ایجاد شد و حتی رابطه بین این دو بازیکن را به شکل قابل توجهی سرد کرد، تا حدی که این موضوع به وضوح در تمرینات و زمین بازی دیده شد. 
           ',
            'views' => 12,
            'status' => 1,
        ]);


        Post::query()->create([
            'author_id' => 1,
            'category_id' => 1,
            'title' => 'عثمان دمبله : زیر نظر ژاوی کمتر مصدوم میشوم.!.',
            'summary' => 'عثمان دمبله میگوید که زیر نظر ژاوی مصدوم نمیشود.',
            'body' => 'عثمان دمبله میگوید که زیر نظر ژاوی مصدوم نمیشود
چیزی که الان به من کمک می کند این است که دائماً بازی کنم. از زمانی که ژاوی آمده است دیگر مصدوم نمی شوم. از نحوه بازی ما و اینکه سرمربی می خواهد راضی هستم. او از ما می خواهد که خوب بازی کنیم و جدی بازی کنیم. من از آمدن ژاوی خوشحالم .
لواندوفسکی سه بازی نیست :
ما لواندوفسکی را با خود می خواهیم،  یک گلزن فوق العاده است، او از ابتدای فصل چندین گل به ثمر رساند، اما ما راه حل هایی داریم و دیگر بازیکنان عملکرد لازم را خواهند داشت.',
            'views' => 5,
            'status' => 1,
        ]);
        Post::query()->create([
            'author_id' => 1,
            'category_id' => 5,
            'title' => 'گلکسی S21 فن ادیشن در مقابل شیائومی ۱۲T؛ کدام را بخریم؟',
            'summary' => 'در این مطلب به مقایسه دو گوشی بسیار پرطرفدار، پرفروش و باکیفیت موجود در بازار یعنی گلکسی S21 فن ادیشن با شیائومی ۱۲T می‌پردازیم؛ ',
            'body' => 'در بخش طراحی، باز هم دو گوشی متفاوت از هم ساخته شده‌اند. شیائومی ۱۲T یک گوشی نسبتا بزرگ با پنل ۶٫۷ اینچی است که قطعا هنگام کار با یک دست با آن با مشکل مواجه می‌شوید. وزن این گوشی هم به ۲۰۲ گرم می‌رسد تا بدین ترتیب در دسته‌ی گوشی‌های نسبتا سنگین قرار بگیرد. علاوه بر این‌ها، ضخامت شیائومی ۱۲T هم به ۸٫۶ میلی‌متر می‌رسد اما این میزان در گلکسی S21 فن ادیشن ۷٫۹ میلی‌متر است تا بدین ترتیب از لحاظ خوش‌دست بودن، نماینده‌ی سامسونگ دست بالاتر را داشته باشد.',
            'views' => 1,
            'status' => 1,
        ]);

        Post::query()->create([
            'author_id' => 1,
            'category_id' => 5,
            'title' => 'راهنمای خرید هدفون گیمینگ؛ بهترین هدست‌ها در تمام رده‌های قیمتی',
            'summary' => 'بحث صدا در تجربه گیمینگ اهمیت بسیار زیادی دارد.',
            'body' => 'بحث صدا در تجربه گیمینگ اهمیت بسیار زیادی دارد. به همین دلیل است که بازی‌ها نیز تمرکز زیادی روی این بخش داشته و تلاش می‌کنند تا بهترین تجربه را در این زمینه به بازیکنان ارائه دهند. نکته اینجاست که هر چقدر هم که یک بازی صداگذاری عملکرد خوبی داشته باشد، اگر کاربرد وسیله خوبی برای گوش دادن نداشته باشد، از آن لذت نخواهد برد. تجربه بازی‌ها با استفاده از اسپیکر دستگاه قطعاً چندان جالب نیست. هرچقدر هم که دستگاه شما اسپیکرهای خوبی داشته باشد، نمی‌تواند به اندازه یک هدفون شما را درگیر کند.',
            'views' => 0,
            'status' => 1,
        ]);
        Post::query()->create([
            'author_id' => 1,
            'category_id' => 5,
            'title' => 'لپ‌تاپ کاستوم کانفیگ چیست؟ چرا یک مدل لپ‌تاپ ده‌ها گزینه‌ی خرید دارد؟',
            'summary' => 'افزایش روزافزون قیمت کامپیوترها و قطعات آن‌ها و مشخصا لپ‌تاپ، خرید یک لپ‌تاپ یا کامپیوتر جدید را به تصمیمی دشوار تبدیل کرده‌اند؛',
            'body' => 'افزایش روزافزون قیمت کامپیوترها و قطعات آن‌ها و مشخصا لپ‌تاپ، خرید یک لپ‌تاپ یا کامپیوتر جدید را به تصمیمی دشوار تبدیل کرده‌اند؛ طوری که پیش از انتخاب یک لپ‌تاپ، منطقی است که بخواهید زمان قابل توجهی را صرف تحقیقات مختلف کنید. نکته‌ی مهم در مورد لپتاپ‌ها این است که به غیر از چند قطعه‌ی معمول، قابلیت ارتقای چندانی ندارند؛ آن هم به به این معنا که بعضی اوقات می‌توانید رم و حافظه‌‌ی ذخیره‌ی لپ‌تاپ را ارتقا دهید، اما موارد بنیادی مثل پردازنده‌ی اصلی یا پردازنده‌ی گرافیکی را نمی‌توان تغییر داد. به همین دلیل هم بهتر است به هنگام خرید یک لپ‌تاپ جدید، این مشخصات اصلی را در اولویت قرار دهید. با این حال، نکته‌ی دیگری هم وجود دارد: یک مدل لپتاپ می‌تواند چندین مشخصات مختلف داشته باشد.',
            'views' => 13,
            'status' => 1,
        ]);
    }
}
