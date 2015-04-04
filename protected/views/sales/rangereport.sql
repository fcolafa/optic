CREATE DEFINER=`root`@`localhost` PROCEDURE `rangereport`(
in ido int,
in init datetime,
in endate datetime

)
BEGIN
select c.client_name, c.client_lastname,t.type_name,s.date, s.payment_method, s.price, u.user_name from sales s
join client c
on c.id_client=s.id_client and s.date between init and endate
join type t
on t.id_type=s.id_type
join users u
on u.id_user=s.id_user
group by s.date;

END