<html>
    <h1>Dokonaj rezerwacji</h1>
    <form action="add" method="POST">
        @csrf
        <input type="date" name="from"><br>
        <input type="date" name="to">
        <button type="submit">Zarezerwuj</button>
    </form>
</html>