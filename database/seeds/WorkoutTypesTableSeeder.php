<?php

use Illuminate\Database\Seeder;
use App\WorkoutType;

class WorkoutTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        WorkoutType::create([
            'name' => 'Forza',
            'description' => "Per una progressione nel body-building e sollevare carichi più pesanti, è interessante esercitarsi sulla forza. La capacità di forza si esprime in modi molto differenti, si distinguono dunque una: 1) capacità di forza massima, è la forza più elevata che il sistema neuromuscolare è in grado di esprimere con una contrazione massima volontaria (Ripetizione Massimale) 2) la capacità di forza resistente utilizzata per il volume muscolare o una congestione temporanea 3) la forza esplosiva per gli sport come lo sprint o i salti4) la forza veloce o potenza per il rugby o il sollevamento pesi (Forza x Velocità)."
        ]);
        WorkoutType::create([
            'name' => 'Ipetrofia',
            'description' => "L’ipertrofia muscolare è la capacità di adattamento principale del muscolo che si manifesta per lo più con l’aumento delle dimensioni delle fibre muscolari a seguito del lavoro contro resistenza, l’allenamento. Nel bodybuilding natural questa è ottenuto tramite la dieta, l’allenamento, e la giusta integrazione. I tre capisaldi dell'ipertrofia sono: 1) Bisogna allenarsi almeno 3 volte a settimana. Al di sotto la frequenza di allenamento è veramente troppo rarefatta per avere risultati degni di nota; 2) Bisogna allenare i muscoli. Questo significa che è necessario usare gli esercizi in funzione dei muscoli che si vogliono colpire 3) Bisogna far durare l’allenamento il tempo sufficiente di aver creato uno stimolo superiore a quello precedente. Il tempo della seduta quindi è relativo, può durare 50 minuti, come due ora (e no, non spariranno i muscoli se aumenta il cortisolo!)"
        ]);
        WorkoutType::create([
            'name' => 'Definizione',
            'description' => "Dopo un periodo di aumento della massa, è necessario smaltire quel poco di grasso in eccesso e definire al meglio il fisico, tramite una scheda di allenamento mirata. Il workout per ottenere una corretta definizione deve basarsi su esercizi che abbinano allenamento e alimentazione, per una dieta di supporto al training. Questo dovrà essere improntato ad evitare gli errori di chi cala i pesi e aumenta le ripetizioni, come nella fase di dimagrimento. Nel lavoro di una scheda di definizione da seguire in palestra, invece, i carichi dovranno rimanere elevati tanto quanto la fase di aumento della massa. In tal modo la muscolatura sarà stimolata a mantenere la forma, e con un’azione mirata alimentare, si tenderà invece a perdere gli ultimi residui di grasso. I pesi andranno tenuti alti per stimolare anche gli ormoni anabolici come ormone GH e testosterone, prodotti in modo naturale con allenamenti intensi. La massa muscolare sarà mantenuta e definita tramite esercizi di isolamento dei distretti muscolari. Il lavoro di allenamento per la definizione muscolare in palestra, inoltre, non va effettuato con alte ripetizioni e pesi bassi, che deprimono il testosterone e alzano il cortisolo che distrugge, al contrario, la massa muscolare. Queste piccole regole sono da tenere presenti perché nel campo della definizione in palestra tramite il body building oltre la dieta (fattore principale), sono necessarie delle evoluzioni tecniche di allenamento."
        ]);
    }
}
