<?php

declare(strict_types=1);

namespace Noldors\Sipuni;

use PHPUnit\Framework\TestCase;

class IntlProviderTest extends TestCase
{
    public function stringsProvider(): array
    {
        return [
            ['', ''],
            ['lemon orange banana apple', 'elmno aegnor aaabnn aelpp'],
            ["lemon\norange\r\nbanana\tapple", "elmno\naegnor\r\naaabnn\taelpp"],
            ['test#word', 'estt#dorw'],
            ['лимон апельсин банан яблоко', 'илмно аеилнпсь аабнн бклооя'],
            ['αβγαβγ αβγαβγαβγ', 'ααββγγ αααβββγγγ'],
            [
                'zZyYxXwWvVuUtTsSrRqQpPoOnNmMlLkKjJiIhHgGfFeEdDcCbBaA',
                'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ'
            ],
            [
                'ZzYyXxWwVvUuTtSsRrQqPpOoNnMmLlKkJjIiHhGgFfEeDdCcBbAa',
                'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ'
            ],
            [
                'яЯюЮэЭьЬыЫъЪщЩшШчЧцЦхХфФуУтТсСрРпПоОнНмМлЛкКйЙиИзЗжЖёЁеЕдДгГвВбБаА',
                'аАбБвВгГдДеЕёЁжЖзЗиИйЙкКлЛмМнНоОпПрРсСтТуУфФхХцЦчЧшШщЩъЪыЫьЬэЭюЮяЯ'
            ],
            [
                'ЯяЮюЭэЬьЫыЪъЩщШшЧчЦцХхФфУуТтСсРрПпОоНнМмЛлКкЙйИиЗзЖжЁёЕеДдГгВвБбАа',
                'аАбБвВгГдДеЕёЁжЖзЗиИйЙкКлЛмМнНоОпПрРсСтТуУфФхХцЦчЧшШщЩъЪыЫьЬэЭюЮяЯ'
            ],
            [
                'яюэьыъщшчцхфутсрпонмлкйизжёедгвба',
                'абвгдеёжзийклмнопрстуфхцчшщъыьэюя'
            ],
            [
                'ろをろよ',
                'よろろを'
            ],
        ];
    }

    /**
     * @dataProvider stringsProvider
     */
    public function testProcess(string $actual, string $expected): void
    {
        $provider = new IntlProvider($actual);

        $this->assertSame($expected, $provider->process());
    }
}
