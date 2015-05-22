<?php

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('DefaultUsersSeeder');
		$this->call('MembersTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ArticlesTableSeeder');
		$this->call('DefaultArticleSeeder');
		$this->call('SponsorsTableSeeder');
		$this->call('SocialNetworksTableSeeder');
		$this->call('AlbumsTableSeeder');
        $this->call('CarsTableSeeder');
        $this->call('DefaultAlbumsTableSeeder');
		//$this->call('PhotosTableSeeder');
	}
}

class DefaultUsersSeeder extends Seeder
{
	public function run()
	{
		$member_1 = new Member();
		$member_1->birthdate = \Carbon\Carbon::now();
		$member_1->firstName = 'Dominic';
		$member_1->lastName = 'Miglar';
		$member_1->role = 'Schriftfuehrer';
		$member_1->welcomeText = '<p>Hallo, ich möchte Euch herzlich auf unserer Webseite begrüßen.</p><p>Meine Hobbies sind Musik mischen, elektrische Anschlussarbeiten, fortgehn und, natürlich, autofahren.</p>';
		$member_1->description = '<p>Lord of ois oafoch!</p><p>Wer was auf sich hält der fährt jetzt Opel.</p>';
		$member_1->job = 'Schueler';
		$member_1->employer = 'HTL Villach IT';
		$member_1->memberSince = 2013;
		$member_1->isWebsiteAdmin = true;
		$member_1->save();

		$admin_username = 'admin';
		$admin_password = 'password';
		$admin_user = User::create([
			'username' => $admin_username,
			'password' => Hash::make($admin_password),
		]);

		$member_1->user()->associate($admin_user);
		$member_1->save();
	}
}

class DefaultArticleSeeder extends Seeder
{
	public function run()
	{
		$article_welcome = new Article();
		$article_welcome->locked = true;
		$article_welcome->subject = 'Willkommen';
		$article_welcome->slug = 'news';
		$article_welcome->body = '<p>auf der Webseite des Opel-Club-Murau!</p><p>Auf dieser Seite findet ihr alle aktuellen Informationen bezüglich des Clubs und unseren Events.</p>';
		$article_welcome->save();

		$article_imprint = new Article();
		$article_imprint->locked = true;
		$article_imprint->subject = 'Impressum';
		$article_imprint->slug = 'imprint';
		$article_imprint->body = '<p> Der Opel-Club Murau ladet euch herzlich zu unserem 12. internationalem Opeltreffen ein. Das Event findet vom 14. bis 17. August 2014 in Lind bei Scheifling statt. </p> <p> Für diese Veranstaltung existiert auch ein <a href="#">Facebook Event</a>. Es würde uns aus organisatorischen Gründen sehr freuen, wenn ihr euch dort eintragen würdet falls ihr vor habt unser Treffen zu besuchen. </p> <h3>Location</h3> <p> Die Location neben dem Badeteich in Lind bei Scheifling ist einmalig. Wir haben zwei Hektar Fläche für unser Treffen zu Verfügung gestellt bekommen. Die Sanitäranlagen (Duschen) des Badebetriebs könnt ihr naturlich auch verwenden. Bei jedem Eintritt ist bereits eine Karte für den Badebetrieb inkludiert. </p> <h3>Highlights</h3> <p> Die Highlights unseres diesjährigen Treffen beinhalten unter anderem: </p> <ul> <li>Sexy-Car-Wash</li> <li>Gogo-Girls</li> <li>Low-Rider Show</li> <li>Party mit top Anlage und top DJ</li> <li>Große Händlermeile mit namhaften Ausstellern</li> <li>Autobewertung mit insgesamt X Pokalen zu vergeben</li> <li>Wanderpokal für den am weitesten angereisten Club</li> <li>Frühshoppen am Samstag ab 10 Uhr mit dem Mareiner Brass</li> <li>und vieles mehr...</li> </ul> <p> Auf Euch wartet ein spannendes und gut geplantes Treffen. Auf euer Kommen freut sich der Opel-Club-Murau! </p> <h3>Adresse</h3> <p> Badeteich zum Mursteg<br /> Flösserstraße 8<br /> A-8811 Scheifling </p>';
		$article_imprint->save();

		$article_about = new Article();
		$article_about->locked = true;
		$article_about->subject = 'Ueber uns';
		$article_about->slug = 'about';
		$article_about->body = '<p>Auf dieser Seite findest Du Informationen zu unserem Club, besonders zu unserer Geschichte.</p>';
		$article_about->save();

		$article_members = new Article();
		$article_members->locked = true;
		$article_members->subject = 'Willkommen';
		$article_members->slug = 'members';
		$article_members->body = '<p>Auf dieser Seite findest du Informationen über alle unsere Mitglieder.</p>';
		$article_members->save();

		$article_contacts = new Article();
		$article_contacts->locked = true;
		$article_contacts->subject = 'Kontakt';
		$article_contacts->slug = 'contact';
		$article_contacts->body = '<p>Über dieses Formular kannst du Kontakt mit uns aufnehmen. Wir werden uns bemühen deine Nachricht schnellstmöglich zu beantworten.</p>';
		$article_contacts->save();
	}
}

class MembersTableSeeder extends Seeder
{
	public function run()
	{
		$member_2 = new Member();
		$member_2->birthdate = \Carbon\Carbon::now();
		$member_2->firstName = 'Thomas';
		$member_2->lastName = 'Rauchenwald';
		$member_2->role = 'Obmann';
		$member_2->welcomeText = '<p>Hallo, ich möchte Euch herzlich auf unserer Webseite begrüßen.</p>';
		$member_2->description = '<p></p>';
		$member_2->job = 'Karosseur';
		$member_2->employer = 'ABC Treibach';
		$member_2->memberSince = 2012;
		$member_2->save();

		$member_3 = new Member();
		$member_3->birthdate = \Carbon\Carbon::now();
		$member_3->onlySupporting = True;
		$member_3->firstName = 'Patrick';
		$member_3->lastName = 'Weilharter';
		$member_3->role = null;
		$member_3->welcomeText = '<p>Hallo, ich möchte Euch herzlich auf unserer Webseite begrüßen.</p>';
		$member_3->description = '<p></p>';
		$member_3->job = 'Polizist';
		$member_3->employer = 'Polizei';
		$member_3->memberSince = 1998;
		$member_3->save();

		$member_4 = new Member();
		$member_4->birthdate = \Carbon\Carbon::now();
		$member_4->firstName = 'Benjamin';
		$member_4->lastName = 'Maier';
		$member_4->role = null;
		$member_3->welcomeText = '<p>Hallo, ich möchte Euch herzlich auf unserer Webseite begrüßen.</p>';
		$member_3->description = '<p></p>';
		$member_4->job = 'Karroseur';
		$member_4->employer = 'Radauer';
		$member_4->memberSince = 2014;
		$member_4->save();
	}
}

class CategoriesTableSeeder extends Seeder
{
	public function run()
	{
		$category_1 = new Category();
		$category_1->name = 'news';
		$category_1->description = 'category for news page articles';
		$category_1->save();

		$category_2 = new Category();
		$category_2->name = 'about';
		$category_2->description = 'category for about us page articles';
		$category_2->save();
	}
}

class SponsorsTableSeeder extends Seeder
{
	public function run()
	{
		$sponsor_1 = new Sponsor();
		$sponsor_1->name = 'Murauer Bier';
		$sponsor_1->description = null;
		$sponsor_1->save();

		$sponsor_2 = new Sponsor();
		$sponsor_2->name = 'Stoelzl';
		$sponsor_2->description = null;
		$sponsor_2->save();

		$sponsor_3 = new Sponsor();
		$sponsor_3->name = 'Radauer';
		$sponsor_3->description = null;
		$sponsor_3->save();
	}
}

class ArticlesTableSeeder extends Seeder
{
	public function run()
	{
		$member_1 = Member::all()->first();
		$category_1 = Category::all()->first();
		$article_1 = new Article();
		$article_1->subject = '12. int. Opeltreffen des OCM';
		$article_1->slug = '12-int-opeltreffen-ocm';
		$article_1->body = '<p> Der Opel-Club Murau ladet euch herzlich zu unserem 12. internationalem Opeltreffen ein. Das Event findet vom 14. bis 17. August 2014 in Lind bei Scheifling statt. </p> <p> Für diese Veranstaltung existiert auch ein <a href="#">Facebook Event</a>. Es würde uns aus organisatorischen Gründen sehr freuen, wenn ihr euch dort eintragen würdet falls ihr vor habt unser Treffen zu besuchen. </p> <h3>Location</h3> <p> Die Location neben dem Badeteich in Lind bei Scheifling ist einmalig. Wir haben zwei Hektar Fläche für unser Treffen zu Verfügung gestellt bekommen. Die Sanitäranlagen (Duschen) des Badebetriebs könnt ihr naturlich auch verwenden. Bei jedem Eintritt ist bereits eine Karte für den Badebetrieb inkludiert. </p> <h3>Highlights</h3> <p> Die Highlights unseres diesjährigen Treffen beinhalten unter anderem: </p> <ul> <li>Sexy-Car-Wash</li> <li>Gogo-Girls</li> <li>Low-Rider Show</li> <li>Party mit top Anlage und top DJ</li> <li>Große Händlermeile mit namhaften Ausstellern</li> <li>Autobewertung mit insgesamt X Pokalen zu vergeben</li> <li>Wanderpokal für den am weitesten angereisten Club</li> <li>Frühshoppen am Samstag ab 10 Uhr mit dem Mareiner Brass</li> <li>und vieles mehr...</li> </ul> <p> Auf Euch wartet ein spannendes und gut geplantes Treffen. Auf euer Kommen freut sich der Opel-Club-Murau! </p> <h3>Adresse</h3> <p> Badeteich zum Mursteg<br /> Flösserstraße 8<br /> A-8811 Scheifling </p>';
		$article_1->member()->associate($member_1);
		$article_1->category()->associate($category_1);
		$article_1->save();

		$article_2 = new Article();
		$article_2->subject = '13. int. Opeltreffen des OCM';
		$article_2->slug = '13-int-opeltreffen-ocm';
		$article_2->body = '<p> Der Opel-Club Murau ladet euch herzlich zu unserem 12. internationalem Opeltreffen ein. Das Event findet vom 14. bis 17. August 2014 in Lind bei Scheifling statt. </p> <p> Für diese Veranstaltung existiert auch ein <a href="#">Facebook Event</a>. Es würde uns aus organisatorischen Gründen sehr freuen, wenn ihr euch dort eintragen würdet falls ihr vor habt unser Treffen zu besuchen. </p> <h3>Location</h3> <p> Die Location neben dem Badeteich in Lind bei Scheifling ist einmalig. Wir haben zwei Hektar Fläche für unser Treffen zu Verfügung gestellt bekommen. Die Sanitäranlagen (Duschen) des Badebetriebs könnt ihr naturlich auch verwenden. Bei jedem Eintritt ist bereits eine Karte für den Badebetrieb inkludiert. </p> <h3>Highlights</h3> <p> Die Highlights unseres diesjährigen Treffen beinhalten unter anderem: </p> <ul> <li>Sexy-Car-Wash</li> <li>Gogo-Girls</li> <li>Low-Rider Show</li> <li>Party mit top Anlage und top DJ</li> <li>Große Händlermeile mit namhaften Ausstellern</li> <li>Autobewertung mit insgesamt X Pokalen zu vergeben</li> <li>Wanderpokal für den am weitesten angereisten Club</li> <li>Frühshoppen am Samstag ab 10 Uhr mit dem Mareiner Brass</li> <li>und vieles mehr...</li> </ul> <p> Auf Euch wartet ein spannendes und gut geplantes Treffen. Auf euer Kommen freut sich der Opel-Club-Murau! </p> <h3>Adresse</h3> <p> Badeteich zum Mursteg<br /> Flösserstraße 8<br /> A-8811 Scheifling </p>';
		$article_2->member()->associate($member_1);
		$article_2->category()->associate($category_1);
		$article_2->save();

		$article_3 = new Article();
		$article_3->subject = '14. int. Opeltreffen des OCM';
		$article_3->slug = '14-int-opeltreffen-ocm';
		$article_3->body = '<p> Der Opel-Club Murau ladet euch herzlich zu unserem 12. internationalem Opeltreffen ein. Das Event findet vom 14. bis 17. August 2014 in Lind bei Scheifling statt. </p> <p> Für diese Veranstaltung existiert auch ein <a href="#">Facebook Event</a>. Es würde uns aus organisatorischen Gründen sehr freuen, wenn ihr euch dort eintragen würdet falls ihr vor habt unser Treffen zu besuchen. </p> <h3>Location</h3> <p> Die Location neben dem Badeteich in Lind bei Scheifling ist einmalig. Wir haben zwei Hektar Fläche für unser Treffen zu Verfügung gestellt bekommen. Die Sanitäranlagen (Duschen) des Badebetriebs könnt ihr naturlich auch verwenden. Bei jedem Eintritt ist bereits eine Karte für den Badebetrieb inkludiert. </p> <h3>Highlights</h3> <p> Die Highlights unseres diesjährigen Treffen beinhalten unter anderem: </p> <ul> <li>Sexy-Car-Wash</li> <li>Gogo-Girls</li> <li>Low-Rider Show</li> <li>Party mit top Anlage und top DJ</li> <li>Große Händlermeile mit namhaften Ausstellern</li> <li>Autobewertung mit insgesamt X Pokalen zu vergeben</li> <li>Wanderpokal für den am weitesten angereisten Club</li> <li>Frühshoppen am Samstag ab 10 Uhr mit dem Mareiner Brass</li> <li>und vieles mehr...</li> </ul> <p> Auf Euch wartet ein spannendes und gut geplantes Treffen. Auf euer Kommen freut sich der Opel-Club-Murau! </p> <h3>Adresse</h3> <p> Badeteich zum Mursteg<br /> Flösserstraße 8<br /> A-8811 Scheifling </p>';
		$article_3->member()->associate($member_1);
		$article_3->category()->associate($category_1);
		$article_3->save();

		$category_2 = Category::whereName('about')->get()->first();
		$article_4 = new Article();
		$article_4->subject = 'Jahresrueckblicke';
		$article_4->slug = 'jahresrueckblicke';
		$article_4->body = ' <p>Begonnen hat das Ganze, wie sollte es anders sein, mit dem ersten Auto.</p> <h3>1996</h3> <p> erfuhren 2 Leute, darunter unser ehemaliger Obmann <a href="#">Patrick Weilharter (Fuzzy)</a> von einem "Opeltreffen" in Kapfenberg. Keiner wusste, um was es bei dieser Veranstaltung genau geht und was sie dort erwartet. Das war für das erste Jahr das einzige Treffen auf dem wir Präsens zeigten. </p> <h3>1997</h3> <p> waren wir schon zu fünft. Es war eine Rießengaudi als wir auf ein Treffen in Kärnten fuhren. Auch dieses Jahr waren wir nur auf diesem einen Treffen. </p> <h3>1998</h3> <p> ging es dann so richtig los. Inzwischen waren wir sieben Opelfreaks. Wir besuchten schon vier Treffen wovon eines sogar in Deutschland war. In diesem Jahr gründeten wir auch das Opelteam Murau. </p> <h3>1999</h3> <p> war ein ereignisreiches und schweres Jahr für uns. Nach internen Meinungsverschiedenheiten verließen uns einige Mitglieder. Trotzdem beschlossen wir für das Jahr 2000 unser eigenes Treffen zu organisieren. Auch unser Name wurde in diesem Jahr von "Opelteam Murau" in "Opelclub Murau" geändert. </p> <h3>2000</h3> <p> das Jahr unseres ersten Treffens! Alle freuten sich schon darauf, aber trotzdem war eine gewisse Unsicherheit da. Haben wir nichts vergessen, alles richtig gemacht? Doch trotz Regens am Freitag hatten wir knapp 300 Autos am Platz. Nicht schlecht fürs erste Treffen! </p> <h3>2001-2004</h3> <p> In diesen Jahren wuchsen wir immer mehr zusammen. Unsere Treffen waren jedes Jahr eine neue Herausforderung und brachten immer neue Überraschungen mit sich. Aber neben den Treffen die wir besuchten gab es auch viele andere Dinge, die wir als Club unternahmen (Besuch des Opelwerks in Rüsselsheim, gemeinsames Osterfeuer, usw.). </p> <h3>2005</h3> <p> Mittlerweile sind wir 17 Mitglieder. Auch heuer haben wir wieder ein Treffen vor uns, wo wir schon mitten in den Vorbereitungen stecken. Alles geht recht gut voran. Einzig das Wetter könnte im Gegensatz zum Vorjahr etwas besser werden. </p> <h3>2014</h3> <p> Zwei Mitglieder verabschiedeten sich von uns leider, dafür dürfen wir unsere 4 neuen Mitglieder <a href="#">Bucher Matthias</a>, <a href="#">Höferer Manuel</a>, <a href="#">Maier Benjamin</a> und <a href="#">Wölfler Thomas</a> herzlichst im Club Willkommen heißen. Der Vorstand des Clubs wurde neu gewählt und wir stecken wieder mitten in den Vorbereitungen für das nächste Treffen im August. Dieses Jahr haben wir einen neuen Standort! </p> ';
		$article_4->member()->associate($member_1);
		$article_4->category()->associate($category_2);
		$article_4->save();
	}
}

class SocialNetworksTableSeeder extends Seeder
{
	public function run()
	{
		$socialNetwork_1 = new SocialNetwork();
		$socialNetwork_1->name = 'Facebook';
		$socialNetwork_1->link = 'https://www.facebook.com/pages/Opel-Club-Murau/114952258515319';
		$socialNetwork_1->save();
	}
}

class DefaultAlbumsTableSeeder extends Seeder
{
    public function run()
    {
        $album_about = new Album();
        $album_about->name = 'About us';
        $album_about->description = 'Photos for the slider on the about us page.';
        $album_about->type = Album::$type['aboutAlbum'];
        $album_about->save();
    }
}

class AlbumsTableSeeder extends Seeder
{
	public function run()
	{
		$album_1 = new Album();
		$album_1->name = '11. int. Opeltreffen des OCM';
		$album_1->description = 'Hier findest du Fotos vom 11. internationalen Opeltreffen des Opel-Club-Murau in St. Georgen.';
		$album_1->type = Album::$type['galleryAlbum'];
		$album_1->save();

		$album_2 = new Album();
		$album_2->name = '10. int. Opeltreffen des OCM';
		$album_2->description = 'Hier findest du Fotos vom 10. internationalen Opeltreffen des Opel-Club-Murau in St. Georgen.';
        $album_2->type = Album::$type['galleryAlbum'];
		$album_2->save();

		$album_3 = new Album();
		$album_3->name = '9. int. Opeltreffen des OCM';
		$album_3->description = 'Hier findest du Fotos vom 9. internationalen Opeltreffen des Opel-Club-Murau in St. Georgen.';
        $album_3->type = Album::$type['galleryAlbum'];
		$album_3->save();

		$album_4 = new Album();
		$album_4->name = 'Kadett C Restauration';
		$album_4->description = 'Hier findest du Fotos unserer Kadett C Restauration.';
        $album_4->type = Album::$type['projectAlbum'];
		$album_4->save();
	}
}

class PhotosTableSeeder extends Seeder {
	public function run()
	{
		$album_1 = Album::get()->first();

		$photo_1 = new Photo();
		$photo_1->album()->associate($album_1);
		$photo_1->save();

		$photo_2 = new Photo();
		$photo_2->album()->associate($album_1);
		$photo_2->save();

		$photo_3 = new Photo();
		$photo_3->album()->associate($album_1);
		$photo_3->save();

		$photo_4 = new Photo();
		$photo_4->album()->associate($album_1);
		$photo_4->save();

		$photo_5 = new Photo();
		$photo_5->album()->associate($album_1);
		$photo_5->save();

		$photo_6 = new Photo();
		$photo_6->album()->associate($album_1);
		$photo_6->save();

		$photo_7 = new Photo();
		$photo_7->album()->associate($album_1);
		$photo_7->save();

		$photo_8 = new Photo();
		$photo_8->album()->associate($album_1);
		$photo_8->save();

		$photo_9 = new Photo();
		$photo_9->album()->associate($album_1);
		$photo_9->save();
	}
}

class CarsTableSeeder extends Seeder {
    public function run() {
        /*$table->string('manufacturer', 255);
        $table->string('model', 255);
        $table->integer('year_built')->nullable();
        $table->integer('horsepower')->nullable();
        $table->text('description')->nullable();*/

        $album_1 = Album::create(['name' => 'dbseed', 'description' => 'dbseed']);

        $member_1 = Member::whereId(1)->first();

        $car_1 = new Car();
        $car_1->manufacturer = 'Opel';
        $car_1->model = 'Vectra C';
        $car_1->horsepower = 122;
        $car_1->yearBuilt = 2004;
        $car_1->member()->associate($member_1);
        $car_1->album()->associate($album_1);
        $car_1->save();

        $car_2 = new Car();
        $car_2->manufacturer = 'Opel';
        $car_2->model = 'Astra G';
        $car_2->horsepower = 122;
        $car_2->yearBuilt = 2004;
        $car_2->member()->associate($member_1);
        $car_2->album()->associate($album_1);
        $car_2->save();

        $car_3 = new Car();
        $car_3->manufacturer = 'Opel';
        $car_3->model = 'Corsa C';
        $car_3->horsepower = 122;
        $car_3->yearBuilt = 2004;
        $car_3->member()->associate($member_1);
        $car_3->album()->associate($album_1);
        $car_3->save();

        $car_4 = new Car();
        $car_4->manufacturer = 'Opel';
        $car_4->model = 'Rekord D';
        $car_4->member()->associate($member_1);
        $car_4->album()->associate($album_1);
        $car_4->save();

    }
}