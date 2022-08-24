

ALTER TABLE sanpham ADD FOREIGN KEY(danhmuc_id) REFERENCES danhmuc(id);
ALTER TABLE chitietdonhang ADD FOREIGN KEY(sanpham_id) REFERENCES sanpham(id);
ALTER TABLE sanpham ADD FOREIGN KEY(nhacungcap_id) REFERENCES nhacungcap(id);
ALTER TABLE chitietdonhang ADD FOREIGN KEY(donhang_id) REFERENCES donhang(id);


https://docs.google.com/spreadsheets/d/1cxk62Jf8Au0Df6yb33zFCFHGyuSlpxdjrF3fe7r596c/edit#gid=0
