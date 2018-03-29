<?php

use Illuminate\Database\Seeder;
use App\ExerciseTechnique;

class ExerciseTechniquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        ExerciseTechnique::create([
            'name' => 'Stripping',
            'description' => "La tecnica dello Stripping (detto anche Drop set, Set discendente o Set a scalare) è una tecnica speciale applicata nell’allenamento di resistenza. Consiste, una volta raggiunto il cedimento muscolare con un determinato carico, nel continuare le ripetizioni con un carico inferiore al fine di riuscire a compiere ulteriori ripetizioni per portare definitivamente a termine la serie, superando l’iniziale ostacolo dell’esaurimento."
        ]);
        ExerciseTechnique::create([
            'name' => 'Superserie',
            'description' => "L’allenamento in superserie (o superset) è una tipologia d’allenamento che prevede due o più esercizi (in questo caso però si comincierà a parlare di tripleset o giant set) eseguiti uno dopo l’altro senza pausa. I muscoli coinvolti possono essere muscoli opposti come il petto e i dorsali, i muscoli antagonisti ovvero quei muscoli che si oppongono al movimento di cui è diretto responsabile il muscolo agonista quali il bicipite che in fase di contrazione permette al muscolo antagonista cioè il tricipite di rilassarsi permettendone il movimento; o superset dello stesso gruppo muscolare."
        ]);
        ExerciseTechnique::create([
            'name' => 'Serie 21',
            'description' => "La Serie a 21 prende il nome dal numero totale di ripetizioni per serie che si eseguono con questa tecnica. Ogni serie prevede l'esecuzione di 21 ripetizioni, ma in realtà si tratta di 3 serie consecutive da 7 ripetizioni nello stesso esercizio, che vengono diversificate tra loro dal diverso arco di movimento compiuto. L'esercizio viene quindi suddiviso in 3 parti: 1) le prime 7 ripetizioni vengono svolte seguendo la parte inferiore dell'arco di movimento; 2) nelle 7 successive si percorre l'arco di movimento superiore che non era stato attraversato precedentemente; 3) le ultime 7 prevedono di attraversare l'arco di movimento completo dell'esercizio."
        ]);
    }
}
