
// JScript �ļ�
/*
���캯����
	Dictionary()
���ԣ�
	CompareMode���Ƚ�ģʽ��0����������   1�����ı�
	Count���ֵ��е���Ŀ��
	ThrowException����������ʱ���Ƿ��׳��쳣
������
	Item(key)����ȡָ������Ӧ��ֵ
	Keys()����ȡ������
	Values()����ȡֵ����
	Add(key,value)����ָ���ļ���ֵ��ӵ��ֵ���
	BatchAdd(keys,values)�����Խ�ָ���ļ���ֵ������ӵ��ֵ��У����ȫ����ӳɹ�������true�����򷵻�false��
	Clear()������ֵ��е�������
	ContainsKey(key)���ֵ����Ƿ����ָ���ļ�
	ContainsValue(value)���ֵ����Ƿ����ָ����ֵ
	Remove(key)��ɾ���ֵ���ָ���ļ�
	TryGetValue(key,defaultValue)�����Ի�ȡ�ֵ���ָ������Ӧ��ֵ������������ڣ�����Ĭ��ֵ
	ToString()�������ֵ������м���ֵ��ɵ��ַ�������ʽΪ�����ŷָ��ļ��б�  �ֺ�  ���ŷָ���ֵ�б�
*/
function Dictionary() {
    var me = this;			//��thisָ�뱣�浽����me��

    this.CompareMode = 1;		//�ȽϹؼ����Ƿ���ȵ�ģʽ��0���������ƣ�1�����ı�

    this.Count = 0;			//�ֵ��е���Ŀ��

    this.arrKeys = new Array();	//�ؼ�������

    this.arrValues = new Array();	//ֵ����

    this.ThrowException = true;	//��������ʱ���Ƿ���throw����׳��쳣

    this.Item = function (key)		//Item��������ȡָ������Ӧ��ֵ������������ڣ������쳣
    {
        var idx = GetElementIndexInArray(me.arrKeys, key);
        if (idx != -1) {
            return me.arrValues[idx];
        }
        else {
            if (me.ThrowException)
                throw "�ڻ�ȡ����Ӧ��ֵʱ�������󣬼������ڡ�";
        }
    }

    this.Keys = function ()		//��ȡ�������м�������
    {
        return me.arrKeys;
    }

    this.Values = function ()		//��ȡ��������ֵ������
    {
        return me.arrValues;
    }

    this.Add = function (key, value)	//��ָ���ļ���ֵ��ӵ��ֵ���
    {
        if (CheckKey(key)) {
            me.arrKeys[me.Count] = key;
            me.arrValues[me.Count] = value;
            me.Count++;
        }
        else {
            if (me.ThrowException)
                throw "�ڽ�����ֵ��ӵ��ֵ�ʱ�������󣬿����Ǽ���Ч���߼��Ѿ����ڡ�";
        }
    }

    this.BatchAdd = function (keys, values)		//�������Ӽ���ֵ���������ɹ����������е������true�����򣬲������κ������false��
    {
        var bSuccessed = false;
        if (keys != null && keys != undefined && values != null && values != undefined) {
            if (keys.length == values.length && keys.length > 0)	//����ֵ�����Ԫ����Ŀ������ͬ
            {
                var allKeys = me.arrKeys.concat(keys);	//����ֵ���ԭ�еļ����¼���һ��������
                if (!IsArrayElementRepeat(allKeys))	//�����������Ƿ�����ظ��ļ�
                {
                    me.arrKeys = allKeys;
                    me.arrValues = me.arrValues.concat(values);
                    me.Count = me.arrKeys.length;
                    bSuccessed = true;
                }
            }
        }
        return bSuccessed;
    }

    this.Clear = function ()			//����ֵ��е����м���ֵ
    {
        if (me.Count != 0) {
            me.arrKeys.splice(0, me.Count);
            me.arrValues.splice(0, me.Count);
            me.Count = 0;
        }
    }

    this.ContainsKey = function (key)	//ȷ���ֵ����Ƿ����ָ���ļ�
    {
        return GetElementIndexInArray(me.arrKeys, key) != -1;
    }

    this.ContainsValue = function (value)	//ȷ���ֵ����Ƿ����ָ����ֵ
    {
        return GetElementIndexInArray(me.arrValues, value) != -1;
    }

    this.Remove = function (key)		//���ֵ����Ƴ�ָ������ֵ
    {
        var idx = GetElementIndexInArray(me.arrKeys, key);
        if (idx != -1) {
            me.arrKeys.splice(idx, 1);
            me.arrValues.splice(idx, 1);
            me.Count--;
            return true;
        }
        else
            return false;
    }

    this.TryGetValue = function (key, defaultValue)	//���Դ��ֵ��л�ȡָ������Ӧ��ֵ�����ָ���������ڣ�����Ĭ��ֵdefaultValue
    {
        var idx = GetElementIndexInArray(me.arrKeys, key);
        if (idx != -1) {
            return me.arrValues[idx];
        }
        else
            return defaultValue;
    }

    this.ToString = function ()		//�����ֵ���ַ���ֵ������Ϊ�� ���ŷָ��ļ��б�  �ֺ�  ���ŷָ���ֵ�б�
    {
        if (me.Count == 0)
            return "";
        else
            return me.arrKeys.toString() + ";" + me.arrValues.toString();
    }

    function CheckKey(key)			//���key�Ƿ�ϸ��Ƿ������еļ��ظ�
    {
        if (key == null || key == undefined || key == "" || key == NaN)
            return false;
        return !me.ContainsKey(key);
    }

    function GetElementIndexInArray(arr, e)	//�õ�ָ��Ԫ���������е����������Ԫ�ش����������У��������������������򷵻�-1��
    {
        var idx = -1;	//�õ�������
        var i;		//����ѭ���ı���
        if (!(arr == null || arr == undefined || typeof (arr) != "object")) {
            try {
                for (i = 0; i < arr.length; i++) {
                    var bEqual;
                    if (me.CompareMode == 0)
                        bEqual = (arr[i] === e);	//�����ƱȽ�
                    else
                        bEqual = (arr[i] == e);		//�ı��Ƚ�
                    if (bEqual) {
                        idx = i;
                        break;
                    }
                }
            }
            catch (err) {
            }
        }
        return idx;
    }

    function IsArrayElementRepeat(arr)	//�ж�һ�������е�Ԫ���Ƿ�����ظ����������������ظ���Ԫ�أ�����true�����򷵻�false��
    {
        var bRepeat = false;
        if (arr != null && arr != undefined && typeof (arr) == "object") {
            var i;
            for (i = 0; i < arr.length - 1; i++) {
                var bEqual;
                if (me.CompareMode == 0)
                    bEqual = (arr[i] === arr[i + 1]);	//�����ƱȽ�
                else
                    bEqual = (arr[i] == arr[i + 1]);		//�ı��Ƚ�
                if (bEqual) {
                    bRepeat = true;
                    break;
                }
            }
        }
        return bRepeat;
    }
}