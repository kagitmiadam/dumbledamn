<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spell;

class SpellSeeder extends Seeder
{
    public function run()
    {
         // #1
         $spell = new Spell();
         $spell->name = "Aberton";
         $spell->description = "Üst düzey de kilit açma büyüsüdür. Alohomora büyüsünün işe yaramadığı zaman kullanılır, Alohomora büyüsünden daha güçlüdür.";
         $spell->required_school_grade_id = 3;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 1;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #2
         $spell = new Spell();
         $spell->name = "Absorbe Protegum";
         $spell->description = "En büyük ve en güçlü kalkan büyüsüdür. Öğrenimi aylar hatta yıllar alabilir. Uygulanışı ise çok tehlikelidir. Eğer yapan büyücünün gücü yetmezse bu yüzden ölebilir.";
         $spell->required_school_grade_id = 4;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 2;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #3
         $spell = new Spell();
         $spell->name = "Accio";
         $spell->description = "Asayla gösterilen nesneyi yanına getirir.";
         $spell->required_school_grade_id = 1;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 3;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #4
         $spell = new Spell();
         $spell->name = "Aguamenti";
         $spell->description = "Asadan su çıkarma büyüsüdür.";
         $spell->required_school_grade_id = 1;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 4;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #5
         $spell = new Spell();
         $spell->name = "Alarte Ascendarev";
         $spell->description = "Gösterilen nesneyi fırlatma büyüsüdür.";
         $spell->required_school_grade_id = 1;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 1;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #6
         $spell = new Spell();
         $spell->name = "Alohomora";
         $spell->description = "Kilit açma büyüsüdür.";
         $spell->required_school_grade_id = 1;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 2;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #7
         $spell = new Spell();
         $spell->name = "Aklapakla";
         $spell->description = "Pis bir bölgeyi temizlemeye yarayan büyüdür.";
         $spell->required_school_grade_id = 2;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 3;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #8
         $spell = new Spell();
         $spell->name = "Anapneo";
         $spell->description = "Boğazına bir şey kaçan birini kurtarma büyüsüdür.";
         $spell->required_school_grade_id = 1;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 4;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #9
         $spell = new Spell();
         $spell->name = "Anteoculatia";
         $spell->description = "Kurbanın saçlarını boynuza dönüştüren büyü.";
         $spell->required_school_grade_id = 2;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 1;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
         // #10
         $spell = new Spell();
         $spell->name = "Aparecium";
         $spell->description = "Görünmez mürekkebi görünür hale getiren büyüdür.";
         $spell->required_school_grade_id = 2;
         $spell->attack_power = 1;
         $spell->defence_power = 10;
         $spell->spell_type_id = 2;
         $spell->how_to_learn = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dui enim, imperdiet nec euismod sit amet, malesuada a turpis.";
         $spell->save();
    }
}
