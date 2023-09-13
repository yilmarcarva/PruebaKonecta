SELECT nombreproducto,idproducto, COUNT(idproducto) totalVentas
	FROM public.ventas
	where nombreproducto!=''
GROUP BY idproducto,nombreproducto
order by totalVentas desc
limit 1