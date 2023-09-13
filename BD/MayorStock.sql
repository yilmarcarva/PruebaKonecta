SELECT categoria, nombreproducto, stock
FROM public.productos
WHERE stock = (SELECT MAX(stock) FROM public.productos);