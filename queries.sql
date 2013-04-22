// Temporary queries for populating tables



insert into vehicleConfig (makeID, modelID, submodelID, engineID) 
select mak, modl, trim, eng from (
select makeID as mak, 
if(modelID is null, 0, modelID) as modl, 
if(trimID is null, 0, trimID) as trim, 
if(engineID is null, 0, engineID) as eng, 
concat_ws('-', makeID, 
  if(modelID is null, 0, modelID), 
  if(trimID is null, 0, trimID), 
  if(engineID is null, 0, engineID)
) as concatted from csvImport 
join vehicleMake on csvImport.make=vehicleMake.name 
join tmpModelTrim on csvImport.model=tmpModelTrim.full 
join vehicleModel on tmpModelTrim.model=vehicleModel.name 
left join vehicleTrim on tmpModelTrim.trim=vehicleTrim.name 
left join vehicleEngine on csvImport.engine=vehicleEngine.name 
group by concatted
) as subq;


update tmpModelTrim set model = if(substring(full, 1, locate(' ', full)-1) = '', substring(full, locate(' ', full)+1), substring(full, 1, locate(' ', full)-1)), trim= if(substring(full, 1, locate(' ', full)-1) = '', NULL, substring(full, locate(' ', full)+1));

CREATE TABLE `tmpModelTrim` (
  `full` varchar(42) DEFAULT NULL,
  `model` varchar(32) DEFAULT NULL,
  `trim` varchar(36) DEFAULT NULL
)