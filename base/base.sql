CREATE TABLE "proveedor" (
"idproveedor" varchar(13) COLLATE "default" NOT NULL,
"tipoidproveedor" char(1) COLLATE "default",
"nombreproveedor" varchar(100) COLLATE "default",
"fecnacproveedor" date,
"ciudnacproveedor" varchar(50) COLLATE "default",
"tipoproveedor" bool,
"direccionproveedor" varchar(100) COLLATE "default",
"telefonoproveedor" varchar(10) COLLATE "default",
"emailproveedor" varchar(50) COLLATE "default",
"estadoproveedor" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
BEGIN;
INSERT INTO "proveedor" VALUES ('1002972824', 'C', 'Mateo Salcedo', '1995-04-06', 'Quito', 't', 'Atuntaqui', '0999999999', 'aslas@gamil.com', 't');
INSERT INTO "proveedor" VALUES ('1004028245', 'c', 'Marco Ponce', '1995-12-01', 'Quito', 't', 'Av Atahualpa', '987952630', 'marco@hotmail.com', 't');
INSERT INTO "proveedor" VALUES ('525522', 'c', 'andres perez', '2018-12-12', 'dsa', 't', 'dasdasd', '254', 'qweqweqw@gmial.com', 't');
COMMIT;


-- Indexes structure for table proveedor
-- ----------------------------
CREATE INDEX "i_idproveedor" ON "proveedor" USING btree ("idproveedor");

-- ----------------------------
-- Primary Key structure for table proveedor
-- ----------------------------
ALTER TABLE "proveedor" ADD PRIMARY KEY ("idproveedor");
