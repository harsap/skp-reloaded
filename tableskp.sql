 
DROP SCHEMA skp;

CREATE SCHEMA skp
  AUTHORIZATION postgres;

DROP TABLE skp.spg_skp_inputskp;

CREATE TABLE skp.spg_skp_inputskp
(
  peg_id integer,
  peg_id_atasan integer,
  id_kegiatan serial NOT NULL,
  nomor_kegiatan integer,
  deskripsi_kegiatan text,
  nilai_angka_kredit integer,
  target_kuantitatif integer,
  satuan_target_kuantitatif character varying(75),
  target_kualitas integer,
  satuan_target_kualitas character varying(40),
  waktu integer,
  satuan_waktu character varying(30),
  biaya double precision,
  satuan_biaya text,
  tgl_pengajuan date DEFAULT now(),
  status integer, -- 1:tugas pokok,2:tugas tambahan
  tahun integer,
  id_entry character varying(21),
  d_entry date DEFAULT now(),
  satuan_kerja_id integer,
  CONSTRAINT spg_skp_inputskp_pkey PRIMARY KEY (id_kegiatan)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE skp.spg_skp_inputskp
  OWNER TO postgres;
COMMENT ON COLUMN skp.spg_skp_inputskp.status IS '1:tugas pokok,2:tugas tambahan';

