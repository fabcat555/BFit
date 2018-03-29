<?php

use Illuminate\Database\Seeder;
use App\ExerciseStep;

class ExerciseStepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        ExerciseStep::create([
            'description' => "Posizionare il bilanciere sulla rastrelliera ad un altezza di circa dieci centimetri più bassa rispetto alle spalle.",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "afferrare l'asta con una presa leggermente più ampia rispetto alle spalle e con i palmi delle mani rivolti in avanti",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "passare con la testa sotto la sbarra e portare le spalle a contatto con l'asta (parte centrale del trapezio), le scapole vanno mantenute addotte (stringere leggermente le spalle)",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "controllare con l'ausilio dello specchio che il centro del bilanciere sia posizionato alla stessa distanza dalle due spalle",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "contrarre gli addominali e spingere con le gambe verso l'alto in modo da staccare il bilanciere dai supporti",
            'exercise_id' => 1
        ]);

        ExerciseStep::create([
            'description' => "lentamente fare un passo all'indietro avvicinandosi ai dispositivi di sicurezza (se presenti)
            ",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "posizionare i talloni ad una larghezza leggermente superiore a quella delle spalle, avendo cura di ruotare le punte dei piedi verso l'esterno di circa 30°
            ",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "spostare leggermente indietro il bacino mettendo in tensione i muscoli femorali; lentamente piegare le gambe scendendo verso il basso, senza lasciarsi cadere ma mantenendo i muscoli in tensione ed evitando movimenti laterali delle ginocchia
            ",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "scendere fino a quando le cosce sono parallele al terreno o, se preferite, fino a quando l'articolazione dell'anca si trova alla stessa altezza di quella del ginocchio",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "se i vostri talloni si staccano dal terreno durante la discesa o avvertite seri problemi di equilibrio risalite nella posizione iniziale e riponete il bilanciere: non siete ancora pronti per eseguire l'esercizio",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "durante il movimento la schiena andrà mantenuta quanto più diritta possibile, evitando di inarcarla ma facendo attenzione a non sbilanciarsi all'indietro",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "poco prima di raggiungere la posizione di massima flessione iniziate a frenare maggiormente il movimento preparandovi per la risalita",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "raggiunta questa posizione spingere con forza sui talloni raddrizzando le gambe ma senza estendere completamente le ginocchia",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "durante la risalita la muscolatura delle cosce va contratta attivamente in modo che gli arti inferiori non compiano pericolosi movimenti oscillatori.",
            'exercise_id' => 1
        ]);
        ExerciseStep::create([
            'description' => "Stendersi in posizione supina sulla panca piana.",
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => "I piedi devono essere appoggio per terra con tibia perpendicolare al suolo.",
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => "Impugnare il bilanciere con i palmi delle mani rivolti in avanti, e una larghezza lievemente maggiore rispetto alle spalle.",
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => "Da questa posizione effettuare delle distensioni verso l'alto del bilanciere, senza raggiungere il blocco articolare nel corso dell'estensione delle braccia.",
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => "Tornare fluidamente in prossimità del medio inferiore dello sterno durante la fase eccentrica verificando che gli avambracci siano perpendicolari col terreno.",
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => "Effettuare l'espirazione nel corso della distensione, inspirare durante la fase discendente del bilanciere (fase eccentrica).",
            'exercise_id' => 2
        ]);
        ExerciseStep::create([
            'description' => "Posizionare i dischi sul bilanciere in modo che permettano a quest'ultimo di essere a circa 23cm da terra.",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "I piedi sono posizionati alla larghezza delle spalle (o leggermente maggiore).",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "Le mani sono posizionate alla larghezza delle spalle e le braccia tese. La presa può essere supina, prona o mista.",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "Inspirare, riempendo la pancia d’aria, e accosciarsi, a un'altezza minore di quella di uno squat. La schiena mantiene le sue curve fisologiche. Il petto è in fuori.",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "Mantenere lo sguardo in avanti e leggermente verso il basso.",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "Staccare il bilanciere, tenendolo il più aderente possibile alle gambe e spingendo i talloni contro il terreno.",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "Portare il bilanciere alla posizione finale, facendo salire il sedere e le spalle contemporaneamente.",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "Effettuare la fase di discesa, tenendo sempre la schiena iperestesa.",
            'exercise_id' => 3
        ]);
        ExerciseStep::create([
            'description' => "Porsi in posizione eretta e le ginocchia leggermente flesse. I piedi sono alla larghezza delle spalle e le braccia lungo i fianchi.",
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => "Impugnare il bilanciere con i palmi verso l'esterno.",
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => "Flettere l'avambraccio verso la spalla e portare il bilanciere fino al punto di massima contrazione.",
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => "Riportare il bilanciere alla posizione di partenza e ripetere il movimento.",
            'exercise_id' => 4
        ]);
        ExerciseStep::create([
            'description' => "Porsi in posizione eretta e le ginocchia leggermente flesse, leggermente staccati dalla poliercolina.",
            'exercise_id' => 5
        ]);
        ExerciseStep::create([
            'description' => "Impugnare la barra e, tenendo il braccio fermo, spingere verso il basso estendendo l'avambraccio.",
            'exercise_id' => 5
        ]);
        ExerciseStep::create([
            'description' => "Riportare la barra in posizione di partenza, fino ad arrivare alla parte superiore degli addominali.",
            'exercise_id' => 5
        ]);
        ExerciseStep::create([
            'description' => "Sedersi su una panca leggermente inclinata.",
            'exercise_id' => 6
        ]);
        ExerciseStep::create([
            'description' => "Afferrare i manubri e portarli ai lati della testa (all'altezza delle orecchie).",
            'exercise_id' => 6
        ]);
        ExerciseStep::create([
            'description' => "Spingere i manubri verso l'alto senza distendere completamente i gomiti.",
            'exercise_id' => 6
        ]);
        ExerciseStep::create([
            'description' => "Riportare i manubri in posizione iniziale e ripetere il movimento.",
            'exercise_id' => 6
        ]);
    }
}
