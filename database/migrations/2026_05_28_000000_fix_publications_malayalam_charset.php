<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixPublicationsMalayalamCharset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('publications')) {
            return;
        }

        DB::statement('ALTER TABLE `publications` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
        DB::statement('ALTER TABLE `publications` MODIFY `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');
        DB::statement('ALTER TABLE `publications` MODIFY `slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');
        DB::statement('ALTER TABLE `publications` MODIFY `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');
        DB::statement('ALTER TABLE `publications` MODIFY `author` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');
        DB::statement('ALTER TABLE `publications` MODIFY `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');
        DB::statement('ALTER TABLE `publications` MODIFY `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');

        if (Schema::hasTable('categories')) {
            DB::statement('ALTER TABLE `categories` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
        }

        $this->repairKnownPublicationRows();
    }

    /**
     * Restore Malayalam text for old seed rows if they were already saved as question marks.
     *
     * @return void
     */
    private function repairKnownPublicationRows()
    {
        $rows = [
            1 => [
                'name' => 'ആൽഫ ബൈബിൾ വ്യാഖ്യാനം - Alpha Bible Commentary (ABC-8 Volume)',
                'content' => '<ul><li>മലയാളഭാഷയില്&zwj; ആദ്യമായി സമ്പൂര്&zwj;ണ്ണ ബൈബിളിന്&zwj;റെ വ്യാഖ്യാനം.</li><li>സമ്പൂർണ്ണ ബൈബിളിലെ 73 പുസ്തകങ്ങളും ശാസ്ത്രീയവും അജപാലനപരവുമായി വിശദീകരിക്കുന്നു.</li><li>കേരളസഭയിലെ പ്രഗത്ഭരായ 35 ബൈബിള്&zwj; പണ്ഡിതരുടെ സംയുക്ത സംരംഭം</li></ul>',
                'author' => 'മലയാളം',
            ],
            2 => [
                'name' => 'ആൽഫ ദൈവശാസ്ത്ര വ്യാഖ്യാനം',
                'content' => '-ക്രിസ്തീയ ദൈവശാസ്ത്രത്തിന്&zwj;റെ അടിസ്ഥാന വിഷയങ്ങള്&zwj; സമഗ്രമായി അപഗ്രഥിക്കുന്ന മലയാളത്തിലെ ആദ്യത്തെ സമ്പൂര്&zwj;ണ്ണ ദൈവശാസ്ത്ര ഗ്രന്ഥാവലി (33 വാല്യങ്ങള്&zwj;).<br />-എക്യുമെനിക്കല്&zwj; ദൈവശാസ്ത്രശൈലി.<br />-വി. ഗ്രന്ഥം, സഭാപിതാക്കന്മാർ, മൗലിക ദൈവശാസ്ത്രം , ധാർമ്മിക ദൈവ ശാസ്ത്രം, കൗദാശിക ദൈവശാസ്ത്രം, ആരാധന ക്രമം തുടങ്ങിയ മേഖലകളെ അപഗ്രഥിക്കുന്നു.',
                'author' => 'മലയാളം',
            ],
            4 => [
                'name' => 'ബൈബിള്‍ ശബ്ദകോശം (Bible Dictionary)',
                'content' => 'സമ്പൂര്&zwj;ണ്ണ ബൈബിളിലെ സമസ്തപദങ്ങളുടെയും സമഗ്രവും ആധികാരികവുമായ പഠനമാണ് ഈ നിഘണ്&zwj;ുവില്&zwj; ഉള്&zwj;പ്പെടുത്തിയിട്ടുളളത്. ഇതൊരു ബഹുഭാഷാ നിഘണ്&zwj;ുവാണ്.ഓരോ മലയാള പദത്തിന്&zwj;റെയും ഇംഗ്ലീഷ്, ഗ്രീക്ക്, ഹീബ്രു സമാനപദങ്ങള്&zwj; അതാത് ലിപികളില്&zwj; നല്&zwj;കിയിട്ടുണ്ട് .ഇത്തരമൊരു ചതുര്&zwj;ഭാഷാ നിഘണ്&zwj;ു മലയാള ഭാഷയില്&zwj; ആദ്യമായാണ് പുറത്തിറങ്ങുന്നത്.',
                'author' => 'Malayalam',
            ],
            5 => [
                'name' => 'വിശ്വാസവും വ്യാഖ്യാനവും (Faith and Interpretation)',
                'content' => 'വിശ്വാസവും യുക്തിയും തമ്മിലുള്ള പാരസ്പര്യം ചിന്തികരെ എക്കാലവും കുഴക്കിയിട്ടുണ്ട്. വിശ്വാസം യുക്തിവിരുദ്ധമാണെന്ന ചിന്തയെ തിരുത്തിക്കൊണ്ട് യുക്തിക്കു മനസ്സിലാക്കുവാന്&zwj; വേണ്ടിയാണ് വിശ്വസിക്കുന്നത് എന്ന് വി. ആന്&zwj;സലേമും വിശ്വാസമെന്നത് യുക്തിയോടുളള തുറവിയാണെന്ന് വി. അഗസ്റ്റിനും വാദിക്കുന്നുണ്ട്.<br />വിശ്വാസത്തെ യുക്തികൊണ്ട് വിശദീകരിക്കാനല്ല വിശ്വാസം യുക്തിഭദ്രമാണെന്ന് വിലയിരുത്താനാണ് അജപാലനത്തിന്&zwj;റെ വഴിത്താരയും കണ്ടതും കേട്ടതുമായ വിശ്വാസ പ്രതിസന്ധികള്&zwj;ക്ക് ഈ ഗ്രന്ഥം ഉത്തരം തേടുന്നത്.',
                'author' => 'Malayalam',
            ],
            6 => [
                'name' => 'ശ്രവണം',
                'content' => 'ആത്മീയത എന്നത് കേള്&zwj;വിയോടുള്ള തുറവിയാണ്. ഏറ്റവും വലിയ ആത്മീയ അവയവം തലച്ചോറോ ഹൃദയമോ അല്ല; ചെവിയാണെന്ന തിരിച്ചറിവ് നമ്മെ ഏറെ ചിന്തിപ്പിക്കുന്നതാണ്. കേള്&zwj;ക്കാന്&zwj; സമയവും സന്നദ്ധതയും ഇല്ലാത്തവരുടെ ആധുനിക ലോകത്തില്&zwj; ശ്രവണത്തിന്&zwj;റെ ആധ്യാത്മികതയ്ക്ക് ഏറെ അര്&zwj;ത്ഥവ്യാപ്തി ഉണ്ട്. തിരുവചനം ശ്രവിച്ചതിന്&zwj;റെ സന്തോഷമാണ് ഈ ഗ്രന്ഥം.',
                'author' => 'Malayalam',
            ],
            9 => [
                'name' => 'ഉപ്പ്',
                'content' => '"അഭയശിലകൾ" എന്ന ശീർഷകത്തിൽ ഇറക്കിയ വചന വ്യാഖ്യാന ഗ്രന്ഥത്തിന്റെ രണ്ടാം ഭാഗമാണ് \'ഉപ്പ്\'. <br />അവതാരം , സ്ത്രീ, വിശ്വാസം, മൂല്യങ്ങൾ, പീഡാനുഭവം,&nbsp; ഉത്&zwnj;ഥാനം, തിരുസഭ എന്നീ ഏഴു ഭാഗങ്ങളിലായി 40 ലേഖനങ്ങൾ ഇതിൽ അടങ്ങിയിരിക്കുന്നു.',
                'author' => 'മലയാളം',
            ],
        ];

        foreach ($rows as $id => $data) {
            DB::table('publications')
                ->where('id', $id)
                ->where(function ($query) {
                    $query->where('name', 'LIKE', '%?%')
                        ->orWhere('content', 'LIKE', '%?%')
                        ->orWhere('author', 'LIKE', '%?%');
                })
                ->update($data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (! Schema::hasTable('publications')) {
            return;
        }

        DB::statement('ALTER TABLE `publications` CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }
}
