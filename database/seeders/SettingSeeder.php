<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        // websit
    	$this->webSite();
        
        // aboutPage
        $this->aboutPage();

        // contact
        $this->contact();

        // media
        $this->media();

        // faq
        // $this->faq();


    }//end of run

    protected function webSite()
    {
        $websitTitle    = ['ar' => 'بيبا ترانس اب', 'en' => 'biba Trans App'];
        $websiDes       = ['ar' => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'en' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'];
        $websitKeywords = ['ar' => json_encode([['value' => 'بيبا ترانس اب'], ['value' => 'بيبا '], ['value' => 'ترانس '], ['value' => 'اب']]), 'en' => json_encode([['value' => 'biba Trans App'], ['value' => 'biba'], ['value' => 'Trans'], ['value' => 'App']])];

        saveTransSetting('websit_title', json_encode($websitTitle));
        saveTransSetting('websit_description', json_encode($websiDes));
        saveTransSetting('websit_keywords', json_encode($websitKeywords));
        
    }//end mof webSite

    protected function aboutPage()
    {
        $aboutPageTitle       = ['ar' => 'من نحن', 'en' => 'About Us'];
        $aboutPageDescription = ['ar' => 'هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة . هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .', 'en' => ''];

        saveTransSetting('about_page_title', json_encode($aboutPageTitle));
        saveTransSetting('about_page_description', json_encode($aboutPageDescription));
        
    }//end mof aboutPage

    protected function contact()
    {
        $items = ['phone' => '(+800) 123 456 7890', 'email' => 'manager@shop.com', 'address' => 'Location store test', 'address_link' => 'http://mjastore.test'];
        
        foreach ($items as $key=>$value) {
            saveTransSetting('contact_' . $key, $value);
        }
        
    }//end mof contact

    protected function media()
    {
        $items = ['facebook' => 'https://www.facebook.com/', 'twitter' => 'https://twitter.com/', 'instagram'  => 'https://www.instagram.com/', 'video_links' => 'https://www.bibaTransApp/.app/watch?v=_cos-M5TbC8', 'google_play' => 'https://bibaTransApp.app', 'apple_store' => 'https://test.com/'];
        
        foreach ($items as $key=>$value) {
            saveTransSetting('media_' . $key, $value);
        }
        
    }//end mof media

    protected function faq()
    {
        $data = '{"title":[{"ar":"\u0645\u0627\u0647\u064a \u0637\u0631\u064a\u0642\u0629 \u0627\u0644\u0634\u0631\u0627\u0621 \u0645\u0646 \u0627\u0644\u0645\u0648\u0642\u0639\u061f","en":"sfg"},{"ar":"\u0645\u0627\u0647\u064a \u0637\u0631\u0642 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629\u061f","en":"\u0645\u0627\u0647\u064a \u0637\u0631\u0642 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629\u061f"},{"ar":"\u0647\u0644 \u062f\u0644\u064a\u0644 \u0645\u062c\u0627\u0644 \u0633\u062a\u0648\u0631 \u061f","en":"\u0647\u0644 \u062f\u0644\u064a\u0644 \u0645\u062c\u0627\u0644 \u0633\u062a\u0648\u0631 \u061f"},{"ar":"\u0627\u0644\u0645\u0646\u062a\u062c\u0627\u062a \u0627\u0644\u062a\u064a \u062a\u0628\u0627\u0639 \u0641\u064a \u0645\u0648\u0642\u0639\u0643\u0645 \u0647\u0644 \u062a\u0639\u0645\u0644 \u0644\u062c\u0645\u064a\u0639 \u0627\u0644\u062f\u0648\u0644\u061f","en":"\u0627\u0644\u0645\u0646\u062a\u062c\u0627\u062a \u0627\u0644\u062a\u064a \u062a\u0628\u0627\u0639 \u0641\u064a \u0645\u0648\u0642\u0639\u0643\u0645 \u0647\u0644 \u062a\u0639\u0645\u0644 \u0644\u062c\u0645\u064a\u0639 \u0627\u0644\u062f\u0648\u0644\u061f"},{"ar":"\u0643\u064a\u0641 \u0623\u062d\u0635\u0644 \u0639\u0644\u0649 \u0627\u0644\u0628\u0637\u0627\u0642\u0629 \u0628\u0639\u062f \u0625\u062a\u0645\u0627\u0645 \u0639\u0645\u0644\u064a\u0629 \u0627\u0644\u062f\u0641\u0639\u061f","en":"\u0643\u064a\u0641 \u0623\u062d\u0635\u0644 \u0639\u0644\u0649 \u0627\u0644\u0628\u0637\u0627\u0642\u0629 \u0628\u0639\u062f \u0625\u062a\u0645\u0627\u0645 \u0639\u0645\u0644\u064a\u0629 \u0627\u0644\u062f\u0641\u0639\u061f"},{"ar":"\u0645\u0627\u0647\u064a \u0627\u0644\u0645\u062f\u0629 \u0627\u0644\u0632\u0645\u0646\u064a\u0629 \u0627\u0644\u062a\u064a \u064a\u062d\u062a\u0627\u062c\u0647\u0627 \u0627\u0644\u0645\u0648\u0642\u0639 \u0644\u0625\u0631\u0633\u0627\u0644 \u0627\u0644\u0628\u0637\u0627\u0642\u0629\u061f","en":"\u0645\u0627\u0647\u064a \u0627\u0644\u0645\u062f\u0629 \u0627\u0644\u0632\u0645\u0646\u064a\u0629 \u0627\u0644\u062a\u064a \u064a\u062d\u062a\u0627\u062c\u0647\u0627 \u0627\u0644\u0645\u0648\u0642\u0639 \u0644\u0625\u0631\u0633\u0627\u0644 \u0627\u0644\u0628\u0637\u0627\u0642\u0629\u061f"},{"ar":"\u0646\u0633\u064a\u062a \u0627\u0633\u0645 \u0627\u0644\u0645\u0633\u062a\u062e\u062f\u0645 \u0623\u0648 \u0627\u0644\u0631\u0642\u0645 \u0627\u0644\u0633\u0631\u064a","en":"\u0646\u0633\u064a\u062a \u0627\u0633\u0645 \u0627\u0644\u0645\u0633\u062a\u062e\u062f\u0645 \u0623\u0648 \u0627\u0644\u0631\u0642\u0645 \u0627\u0644\u0633\u0631\u064a"}],"description":[{"ar":"\u062e\u062f\u0645\u0629 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629 \u062d\u0627\u0644\u064a\u0627 \u0647\u064a \u0627\u0644\u062a\u062d\u0648\u064a\u0644 \u0627\u0644\u0628\u0646\u0643\u064a\u060c \u0627\u0644\u062f\u0641\u0639 \u0628\u0627\u0644\u0641\u064a\u0632\u0627 \u0648\u0645\u0627\u0633\u062a\u0631 \u0643\u0627\u0631\u062f \u0648\u0623\u064a\u0636\u064b\u0651\u0627 \u0639\u0628\u0631 \u0628\u0637\u0627\u0642\u0629 \u0645\u062f\u0649 \u0627\u0644\u0628\u0646\u0643\u064a\u0629","en":"sfg"},{"ar":"\u062e\u062f\u0645\u0629 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629 \u062d\u0627\u0644\u064a\u0627 \u0647\u064a \u0627\u0644\u062a\u062d\u0648\u064a\u0644 \u0627\u0644\u0628\u0646\u0643\u064a\u060c \u0627\u0644\u062f\u0641\u0639 \u0628\u0627\u0644\u0641\u064a\u0632\u0627 \u0648\u0645\u0627\u0633\u062a\u0631 \u0643\u0627\u0631\u062f \u0648\u0623\u064a\u0636\u064b\u0651\u0627 \u0639\u0628\u0631 \u0628\u0637\u0627\u0642\u0629 \u0645\u062f\u0649 \u0627\u0644\u0628\u0646\u0643\u064a\u0629","en":"sfg"},{"ar":"\u062e\u062f\u0645\u0629 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629 \u062d\u0627\u0644\u064a\u0627 \u0647\u064a \u0627\u0644\u062a\u062d\u0648\u064a\u0644 \u0627\u0644\u0628\u0646\u0643\u064a\u060c \u0627\u0644\u062f\u0641\u0639 \u0628\u0627\u0644\u0641\u064a\u0632\u0627 \u0648\u0645\u0627\u0633\u062a\u0631 \u0643\u0627\u0631\u062f \u0648\u0623\u064a\u0636\u064b\u0651\u0627 \u0639\u0628\u0631 \u0628\u0637\u0627\u0642\u0629 \u0645\u062f\u0649 \u0627\u0644\u0628\u0646\u0643\u064a\u0629","en":"sfg"},{"ar":"\u062e\u062f\u0645\u0629 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629 \u062d\u0627\u0644\u064a\u0627 \u0647\u064a \u0627\u0644\u062a\u062d\u0648\u064a\u0644 \u0627\u0644\u0628\u0646\u0643\u064a\u060c \u0627\u0644\u062f\u0641\u0639 \u0628\u0627\u0644\u0641\u064a\u0632\u0627 \u0648\u0645\u0627\u0633\u062a\u0631 \u0643\u0627\u0631\u062f \u0648\u0623\u064a\u0636\u064b\u0651\u0627 \u0639\u0628\u0631 \u0628\u0637\u0627\u0642\u0629 \u0645\u062f\u0649 \u0627\u0644\u0628\u0646\u0643\u064a\u0629","en":"\u0643\u064a\u0641 \u0623\u062d\u0635\u0644 \u0639\u0644\u0649 \u0627\u0644\u0628\u0637\u0627\u0642\u0629 \u0628\u0639\u062f \u0625\u062a\u0645\u0627\u0645 \u0639\u0645\u0644\u064a\u0629 \u0627\u0644\u062f\u0641\u0639\u061f"},{"ar":"\u062e\u062f\u0645\u0629 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629 \u062d\u0627\u0644\u064a\u0627 \u0647\u064a \u0627\u0644\u062a\u062d\u0648\u064a\u0644 \u0627\u0644\u0628\u0646\u0643\u064a\u060c \u0627\u0644\u062f\u0641\u0639 \u0628\u0627\u0644\u0641\u064a\u0632\u0627 \u0648\u0645\u0627\u0633\u062a\u0631 \u0643\u0627\u0631\u062f \u0648\u0623\u064a\u0636\u064b\u0651\u0627 \u0639\u0628\u0631 \u0628\u0637\u0627\u0642\u0629 \u0645\u062f\u0649 \u0627\u0644\u0628\u0646\u0643\u064a\u0629","en":"\u0643\u064a\u0641 \u0623\u062d\u0635\u0644 \u0639\u0644\u0649 \u0627\u0644\u0628\u0637\u0627\u0642\u0629 \u0628\u0639\u062f \u0625\u062a\u0645\u0627\u0645 \u0639\u0645\u0644\u064a\u0629 \u0627\u0644\u062f\u0641\u0639\u061f"},{"ar":"\u062e\u062f\u0645\u0629 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629 \u062d\u0627\u0644\u064a\u0627 \u0647\u064a \u0627\u0644\u062a\u062d\u0648\u064a\u0644 \u0627\u0644\u0628\u0646\u0643\u064a\u060c \u0627\u0644\u062f\u0641\u0639 \u0628\u0627\u0644\u0641\u064a\u0632\u0627 \u0648\u0645\u0627\u0633\u062a\u0631 \u0643\u0627\u0631\u062f \u0648\u0623\u064a\u0636\u064b\u0651\u0627 \u0639\u0628\u0631 \u0628\u0637\u0627\u0642\u0629 \u0645\u062f\u0649 \u0627\u0644\u0628\u0646\u0643\u064a\u0629","en":"\u0645\u0627\u0647\u064a \u0627\u0644\u0645\u062f\u0629 \u0627\u0644\u0632\u0645\u0646\u064a\u0629 \u0627\u0644\u062a\u064a \u064a\u062d\u062a\u0627\u062c\u0647\u0627 \u0627\u0644\u0645\u0648\u0642\u0639 \u0644\u0625\u0631\u0633\u0627\u0644 \u0627\u0644\u0628\u0637\u0627\u0642\u0629\u061f"},{"ar":"\u062e\u062f\u0645\u0629 \u0627\u0644\u062f\u0641\u0639 \u0627\u0644\u0645\u062a\u0627\u062d\u0629 \u062d\u0627\u0644\u064a\u0627 \u0647\u064a \u0627\u0644\u062a\u062d\u0648\u064a\u0644 \u0627\u0644\u0628\u0646\u0643\u064a\u060c \u0627\u0644\u062f\u0641\u0639 \u0628\u0627\u0644\u0641\u064a\u0632\u0627 \u0648\u0645\u0627\u0633\u062a\u0631 \u0643\u0627\u0631\u062f \u0648\u0623\u064a\u0636\u064b\u0651\u0627 \u0639\u0628\u0631 \u0628\u0637\u0627\u0642\u0629 \u0645\u062f\u0649 \u0627\u0644\u0628\u0646\u0643\u064a\u0629","en":"\u0646\u0633\u064a\u062a \u0627\u0633\u0645 \u0627\u0644\u0645\u0633\u062a\u062e\u062f\u0645 \u0623\u0648 \u0627\u0644\u0631\u0642\u0645 \u0627\u0644\u0633\u0631\u064a"}]}';

        saveSetting('faq', $data);
        
    }//end mof faq

}//end of class