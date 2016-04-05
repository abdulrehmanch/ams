select count(*) as aggregate from ams.assets where "model_id" = 2 
GROUP BY "created_at"

order by "created_at" asc 