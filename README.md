# Chess
Для определенности - 
1) Шахматная доска расположена к нам белыми фигурами.
2) Нумерация фигур идет слева направо. Параллельно белой пешке Р1 стоит черная пешка Р1.
## Методы API ##
1. http://localhost/?apitest.game={"param":"new"} - начинает новую игру.
2. http://localhost/?apitest.game={"param":"check"} - выводит состояние партии.
3. http://localhost/?apitest.game={"param":"P1a4"} - Делает ход. В данном случае пешка под номером 1 идет на клетку А4. Указывать белая или черная пешка - не нужно. Программа вычисляет это автоматически.
#### Пример детского мата ####
1. http://localhost/?apitest.game={"param":"P5e4"}
2. http://localhost/?apitest.game={"param":"P1a6"}
3. http://localhost/?apitest.game={"param":"F1h5"}
4. http://localhost/?apitest.game={"param":"P1a5"}
5. http://localhost/?apitest.game={"param":"S2c4"}
6. http://localhost/?apitest.game={"param":"P1a4"}
7. http://localhost/?apitest.game={"param":"F1f7"}
##### Программа имеет недоработки из-за сместившейся сессии и поджимающих дедлайнов( #####

