<h3>Kontroler</h3>
<p>W katalogu <code>controllers</code> znajdują się klasy odpowiadające danemu działowi strony.</p>
<p>Routing aplikacji prezentuje się następująco: <code>/&lt;kontroler&gt;/&lt;akcja&gt;/&lt;parametr1&gt;/&lt;parametrN&gt;</code>.</p>
<p>Przykładowo, wchodząc na stronę logowania: <code>/<strong>user</strong>/<strong>login</strong></code>,<br>
Zostanie wywołana metoda <code>controllers/<strong>User</strong>Controller.php@<strong>login</strong></code>.</p>
<p><strong>Demo</strong> parametrów: <a href="<?= get_url('home/demo/John/Doe/Artist') ?>">Link</a></p>
<p>Strona, którą widzisz, to domyślna metoda <code>controllers/HomeController.php@index</code>.</p>
<p><strong>Tworząc kontroler</strong>, pamiętaj o 4 punktach</p>
<ul>
<li>Musi rozszerzać klasę <code>Controller</code></li>
<li>Musi znajdować się w katalogu <code>controllers/</code></li>
<li>Nazwa klasy - zaczyna się od dużej litery i kończy na Controller np. <code>UserController</code></li>
<li>Nazwa pliku - nazwa klasy + rozszerzenie np. <code>UserController.php</code></li>
</ul>

<h3>Model</h3>
<p>Klasa reprezentująca pojedynczą tabelę w bazie danych.</p>
<p>Z poziomu modelu mamy dostęp do połączenia <strong>PDO</strong> poprzez atrybut <code>$this->db</code>.</p>
<p>Dostęp do metod modelu: <code>UserModel::instance()->metoda()</code></p>
<p>Przykłady działań:</p>
<pre>
// Pobieranie pojedynczego rekordu
$stmt = $this->db->prepare("SELECT username FROM users WHERE id = 1");
$stmt->execute();
$user = $stmt->fetch();

// Pobieranie kolekcji elementów
$stmt = $this->db->query('SELECT * FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Wstawianie rekordu
$stmt = $this->db->prepare(
    'INSERT INTO users (username, password) VALUES (:username, :password)'
);
$stmt->execute([
    ':username' => $username,
    ':password' => $password
]);
$count_inserted_rows = $stmt->rowCount();

// Aktualizacja rekordu
$stmt = $this->db->prepare('UPDATE users SET password = ? WHERE id = ?');
$stmt->execute([$newPassword, $id]);
$count_updated_rows = $stmt->rowCount();
</pre>
<p>Dokumentacja PDO: <a href="http://php.net/manual/en/class.pdostatement.php">http://php.net/manual/en/class.pdostatement.php</a></p>

<p><strong>Tworząc model</strong>, pamiętaj o 4 punktach</p>
<ul>
    <li>Musi rozszerzać klasę <code>Model</code></li>
    <li>Musi znajdować się w katalogu <code>models/</code></li>
    <li>Nazwa klasy - zaczyna się od dużej litery i kończy na Model np. <code>UserModel</code></li>
    <li>Nazwa pliku - nazwa klasy + rozszerzenie np. <code>UserModel.php</code></li>
</ul>

<h3>Widoki</h3>
<p>Wyświetlaniem szablonów zajmuje się prosta klasa <code>core/ViewRenderer.php</code>,<br>dostępna jako <code>$this->view</code> z poziomu kontrolerów.</p>
<p>Aby załadować szablon z poziomu metody kontrolera:<br><code>$this->view->setTemplate('zmienna_w_szablonie', 'nazwa_szablonu');</code></p>
<p>Pamiętaj, że wypełniając nazwę szablonu, nie podawaj jego rozszerzenia.</p>

<p>Aby dodać zmienne do szablonu:<br><code>$this->view->set(['zmienna1' => 1, 'zmienna2' => 2]);</code></p>
<p>Metoda <code>controllers/home.php@demo</code> zawiera przykładowy kod.</p>
<p>Więcej informacji wkrótce (-: <strong>@wujku</strong></p>