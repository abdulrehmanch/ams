
-- Drop FUNCTION get_geojson(val text)

CREATE or REPLACE FUNCTION get_geojson() 
RETURNS json AS
$$
SELECT row_to_json(fc) FROM (
                SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features FROM (
                SELECT 'Feature' As type , public.ST_AsGeoJSON(lg.geom)::json As geometry , row_to_json((
                SELECT l FROM (
                SELECT scheme_id, scheme_name, scheme_code, scheme_type, village_name, village_code, tehsil_name, tehsil_code, scheme_status, division, district, geom ) As l )) As properties
                FROM basemap.saafpani_schemes As lg ) As f ) As fc;
$$ LANGUAGE sql;

SELECT get_geojson()

INSERT INTO basemap.json_table(
            geojson)
    VALUES (get_geojson());


SELECT row_to_json(fc) FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features FROM ( SELECT 'Feature' As type , ST_AsGeoJSON(lg.geom)::json As geometry , row_to_json(( SELECT l FROM ( SELECT scheme_id, scheme_name, scheme_code, scheme_type, village_name, village_code, tehsil_name, tehsil_code, scheme_status, division, district, geom ) As l )) As properties FROM basemap.saafpani_schemes As lg ) As f ) As fc