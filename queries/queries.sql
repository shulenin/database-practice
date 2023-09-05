-- Задание 1
SELECT goods.id, goods.name, p.value as price, sb.quantity as stock_quantity, s.name as stock_name
FROM goods
         LEFT JOIN prices p on goods.id = p.goods_id
         LEFT JOIN stock_balances sb on goods.id = sb.goods_id
         LEFT JOIN stocks s on sb.stock_id = s.id
WHERE sb.goods_id IS NOT NULL
;

-- Задание 2
SELECT goods.id, goods.name, p.value as price_value, cv.value as characteristics_value, sb.goods_id
FROM goods
         LEFT JOIN prices p on goods.id = p.goods_id
         LEFT JOIN characteristics_values cv on goods.id = cv.goods_id
         LEFT JOIN char_kinds ck on cv.char_kind_id = ck.id
         LEFT JOIN stock_balances sb on goods.id = sb.goods_id
WHERE sb.goods_id IS NULL
;

-- Задание 3
SELECT goods.id, goods.name, p.value as price, sb.quantity as stock_quantity
FROM goods
         LEFT JOIN prices p on goods.id = p.goods_id
         LEFT JOIN stock_balances sb on goods.id = sb.goods_id
         LEFT JOIN stocks s on sb.stock_id = s.id
WHERE s.id = 1
;

-- Задание 4
SELECT goods.id, goods.name, SUM(p.value) as price, SUM(sb.quantity) as stock_quantity, s.id
FROM goods
         LEFT JOIN prices p on goods.id = p.goods_id
         LEFT JOIN stock_balances sb on goods.id = sb.goods_id
         LEFT JOIN stocks s on sb.stock_id = s.id
GROUP BY s.id, goods.id, goods.name
;