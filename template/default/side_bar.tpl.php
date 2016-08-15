<div id="leftside">
            <h2>Категории</h2>
            <ul>
                <li>Транспорт</li>
                <ul>
                    <li>Авто</li>
                    <li>Мото</li>
                </ul>
                <li>Интернет</li>
                <ul>
                    <li>Компьютеры</li>
                    <li>Игры</li>
                </ul>
                <li>Дом</li>
                <ul>
                    <li>Мебель</li>
                    <li>Сантехника</li>
                </ul>
                <li>Сад, огород</li>
                <ul>
                    <li>Инструмент</li>
                    <li>Стройматериалы</li>
                </ul>
            </ul>
            <h2>Поиск</h2>
            <form method="get" action="?action=search">
                <input name="action" value="search" type="hidden">
                Поиск<br> 
                <input name="search" type="text">
                <br><br>
                Категория<br>
                <select name="id_categories" id="">
                    <option selected="selected" value="">Выберите категорию</option>
                    <optgroup label="Транспорт">
                       <option value="5">--Автомобили</option>
                       <option value="6">--Мото</option>                        
                    </optgroup>
                    <optgroup label="Интернет">
                       <option value="7">--Компьютеры</option>
                       <option value="8">--Игры</option>                        
                    </optgroup>
                    <optgroup label="Дом">
                       <option value="9">--Мебель</option>
                       <option value="10">--Сантехника</option>                        
                    </optgroup>
                    <optgroup label="Дом">
                       <option value="11">--Мебель</option>
                       <option value="12">--Сантехника</option>                        
                    </optgroup>
                    
                </select>
                <br><br>
                Тип объявления<br>
                <input name="id_razd" value="1" type="radio">Предложение
                <input name="id_razd" value="2" type="radio">Спрос
                <br><br>
                Диапазон цен<br>
                От <input name="p_min" class="p_search" type="text"><br> До <input name="p_max" class="p_search" type="text">
                <br><br>
                <input value="Поиск" type="submit">
            </form>
            
            
        </div>