<h2>Luo uusi laulu</h2>
<p>Aiemmin luodut laulut löytyvät <a href="biisit/">täältä</a> .tex muodossa.</p>
<form action="biisinsyotto.php" method="post" accept-charset="UTF-8">
<p>
    <input name="laulun_nimi" value="Laulun nimi"/>
    <br></br>
    Voit laittaa laulun tietoja tai sävelen tähän. Voi jättää myös tyhjäksi.
    <br></br>
    <input name="melody" value=""/>
    <br></br>
    <textarea rows="30" cols="50" name="laulun_sanat">Laulun sanat</textarea>
    <br></br>
    <input type="submit" name="submit" value="Tallenna laulu"/>
</p>
</form>


<h2>Luo uudet säännöt</h2>
<p>Aiemmin luodut säännöt löytyvät <a href="rules/">täältä</a> .tex muodossa.</p>
<form action="rules_input.php" method="post" accept-charset="UTF-8">
<p>
    <input name="rules_name" value="Sääntöjen nimi"/>
    <br></br>
    Kirjoita tähän säännöt.
    <br></br>
    <textarea rows="30" cols="50" name="rules_input">Säännöt tähän.</textarea>
    <br></br>
    <input type="submit" name="saannot" value="Tallenna säännöt"/>
</p>
</form>

